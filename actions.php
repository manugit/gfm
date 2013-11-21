<?php
//Testcomment
require 'dbConnection.php';
//blah
if ("addPot" == ($_POST["action"])) {
	addPot($dbh);
} else if ("addItem" == ($_POST["action"])) {
	addItem($dbh);
} else if ("editItem" == ($_POST["action"])) {
	editItem($dbh);
} else if ("removeItem" == ($_POST["action"])) {
	removeItem($dbh);
} else if ("addParticipant" == ($_POST["action"])) {
	addParticipant($dbh);
} else if ("editParticipant" == ($_POST["action"])) {
	editParticipant($dbh);
} else if ("removeParticipant" == ($_POST["action"])) {
	removeParticipant($dbh);
} else if ("changeProductOrder" == ($_POST["action"])) {
	changeProductOrder($dbh);
}

function getUserIdByNickname($dbh, $nickname) {
	$statement = $dbh->prepare("SELECT id FROM user WHERE nickname = :nickname");
	$statement->execute(array(':nickname' => $nickname));
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	return $row["id"];
}

function getPotpositionIdsFromPotId($dbh, $potId) {
	$statement = $dbh->prepare("SELECT id FROM potposition WHERE pot_id = :potId");
	$statement->execute(array(':potId' => $potId));
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function convertSwissDateToSqlDate($date) {
	$phpDate = date_parse_from_format("j.n.Y", $date);
	$timestamp = mktime(0, 0, 0, $phpDate['month'], $phpDate['day'], $phpDate['year']);
	return date('Y-m-d', $timestamp);
}

function addPot($dbh) {
	$response = array();
	try {
		$dbh->beginTransaction();
		
		// create url hash
		$characters = "abcdefghijklmnopqrstuvwxyz0123456789";
		$random_string_length = 15;
		$urlHash = "";
		for ($i = 0; $i < $random_string_length; $i++) {
			$urlHash .= $characters[rand(0, strlen($characters) - 1)];
		}
		
		// add pot
		$stmt = $dbh->prepare("INSERT INTO pot (name, description, startdate, enddate, url_hash) VALUES (?, ?, ?, ?, ?);");
		$stmt->execute(array($_POST["potname"], $_POST["potdescription"], convertSwissDateToSqlDate($_POST["validFrom"]), convertSwissDateToSqlDate($_POST["validTo"]), $urlHash));
		$potId = $dbh->lastInsertId();
		
		// add creator, check if user already exists -> reuse
		$userId = getUserIdByNickname($dbh, $_POST["nickname"]);
		if ("" == $userId) {
			$sql = "INSERT INTO user (nickname, name, firstname, email, birthdate) ";
			$sql .= "VALUES ('".$_POST["nickname"]."', '".$_POST["name"]."', '".$_POST["firstname"]."', '".$_POST["email"]."', '".convertSwissDateToSqlDate($_POST["birthday"])."');";
			$dbh->exec($sql);
			$userId = $dbh->lastInsertId();
		}
		
		// add user2pot
		$stmt = $dbh->prepare("INSERT INTO user2pot (user_id, pot_id) VALUES (?, ?);");
		$stmt->execute(array($userId, $potId));
	
		$dbh->commit();
		$response["urlHash"] = $urlHash;
		$response["server"] = $_SERVER['HTTP_HOST'];
		$response["success"] = true;
		$response["message"] = "Der Pot wurde erfolgreich hinzugef&uuml;gt.";
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim Hinzugef&uuml;gen des Pots aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}

function addItem($dbh) {
	$response = array("name" => $_POST["name"], "price" => $_POST["amount"], "date" => $_POST["date"], "buyer" => $_POST["buyer"], "consumptions" => $_POST["consumptions"]);
	try {
		$dbh->beginTransaction();
		
		$statement = $dbh->prepare("SELECT position FROM potposition WHERE pot_id = :potId ORDER BY position DESC LIMIT 1");
		$statement->execute(array(':potId' => $_POST["potId"]));
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$position = $row["position"] + 1;
		
		$sql = "INSERT INTO potposition (description, amount, date, payer_id, pot_id, position) ";
		$sql .= "VALUES ('".$_POST["name"]."', ".$_POST["amount"].", '".convertSwissDateToSqlDate($_POST["date"])."', ".getUserIdByNickname($dbh, $_POST["buyer"]).", ".$_POST["potId"].", ".$position.");";
		$dbh->exec($sql);
		$potpositionId = $dbh->lastInsertId();
	
		$stmt = $dbh->prepare("INSERT INTO consumption (amount, user_id, potposition_id) VALUES (?, ?, ?);");
		for ($i = 0; $i < count($_POST["consumptions"]); $i++) {
			$stmt->execute(array($_POST["consumptions"][$i][1]/100, getUserIdByNickname($dbh, $_POST["consumptions"][$i][0]), $potpositionId));
		}
	
		$dbh->commit();
		$response["itemId"] = $potpositionId;
		$response["success"] = true;
		$response["message"] = "Die Ausgabe wurde erfolgreich hinzugef&uuml;gt.";
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim Hinzugef&uuml;gen der Ausgabe aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}

function editItem($dbh) {
	$response = array("name" => $_POST["name"], "price" => $_POST["amount"], "date" => $_POST["date"], "buyer" => $_POST["buyer"], "itemId" => $_POST["id"], "consumptions" => $_POST["consumptions"]);
	try {
		$dbh->beginTransaction();
		$payerId = getUserIdByNickname($dbh, $_POST["buyer"]);
		$stmt = $dbh->prepare("UPDATE potposition SET description = ?, amount = ?, date = ?, payer_id = ? WHERE id = ?;");
		$stmt->execute(array($_POST["name"], $_POST["amount"], convertSwissDateToSqlDate($_POST["date"]), $payerId, $_POST["id"]));
	
		$stmt = $dbh->prepare("UPDATE consumption SET amount = ? WHERE user_id = ? AND potposition_id = ?;");
		for ($i = 0; $i < count($_POST["consumptions"]); $i++) {
			$stmt->execute(array($_POST["consumptions"][$i][1]/100, getUserIdByNickname($dbh, $_POST["consumptions"][$i][0]), $_POST["id"]));
		}
	
		$dbh->commit();
		$response["success"] = true;
		$response["message"] = "Die Ausgabe wurde erfolgreich bearbeitet.";
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim Bearbeiten der Ausgabe aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}

function removeItem($dbh) {
	$response = array("rowId" => $_POST["id"]);
	try {
		$dbh->beginTransaction();
		$stmt = $dbh->prepare("DELETE FROM potposition WHERE id = ?");
		$stmt->execute(array($_POST["id"]));
		// we don't need to delete the consumptions due to the cascading rule
	
		$dbh->commit();
		$response["success"] = true;
		$response["message"] = "Die Ausgabe wurde erfolgreich gel&ouml;scht.";
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim L&ouml;schen der Ausgabe aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}

function addParticipant($dbh) {
	$response = array("nickname" => $_POST["nickname"], "name" => $_POST["name"], "firstname" => $_POST["firstname"], "email" => $_POST["email"], "birthday" => $_POST["birthday"]);
	try {
		$dbh->beginTransaction();
		// check if user already exists -> reuse
		$userId = getUserIdByNickname($dbh, $_POST["nickname"]);
		if ("" == $userId) {
			$sql = "INSERT INTO user (nickname, name, firstname, email, birthdate) ";
			$sql .= "VALUES ('".$_POST["nickname"]."', '".$_POST["name"]."', '".$_POST["firstname"]."', '".$_POST["email"]."', '".convertSwissDateToSqlDate($_POST["birthday"])."');";
			$dbh->exec($sql);
			$userId = $dbh->lastInsertId();
		}
		
		$sql = "INSERT INTO user2pot (user_id, pot_id) ";
		$sql .= "VALUES (".$userId.", ".$_POST["potId"].");";
		$dbh->exec($sql);
		
		$potpositionIds = getPotpositionIdsFromPotId($dbh, $_POST["potId"]);
		for ($i = 0; $i < count($potpositionIds); $i++) {
			$sql = "INSERT INTO consumption (amount, user_id, potposition_id) ";
			$sql .= "VALUES (0, ".$userId.", ".$potpositionIds[$i]["id"].");";
			$dbh->exec($sql);
		}
	
		$dbh->commit();
		$response["id"] = $userId;
		$response["success"] = true;
		$response["message"] = "Der Teilnehmer wurde erfolgreich hinzugef&uuml;gt.";
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim Hinzugef&uuml;gen des Teilnehmers aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}

function editParticipant($dbh) {
	$response = array("id" => $_POST["id"], "nickname" => $_POST["nickname"], "name" => $_POST["name"], "firstname" => $_POST["firstname"], "email" => $_POST["email"], "birthday" => $_POST["birthday"]);
	try {
		$dbh->beginTransaction();
		$stmt = $dbh->prepare("UPDATE user SET name = ?, firstname = ?, email = ?, birthdate = ? WHERE id = ?;");
		$stmt->execute(array($_POST["name"], $_POST["firstname"], $_POST["email"], convertSwissDateToSqlDate($_POST["birthday"]), $_POST["id"]));
		$dbh->commit();
		$response["success"] = true;
		$response["message"] = "Der Teilnehmer wurde erfolgreich bearbeitet.";
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim Bearbeiten des Teilnehmers aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}

function removeParticipant($dbh) {
	$response = array("id" => $_POST["id"], "nickname" => $_POST["nickname"]);
	try {
		$dbh->beginTransaction();
		if (!isParticipantInUse($dbh, $_POST["id"], $_POST["potId"])) {
			$stmt = $dbh->prepare("DELETE c FROM consumption c INNER JOIN potposition p ON c.potposition_id = p.id WHERE user_id = ? AND p.pot_id = ?");
			$stmt->execute(array($_POST["id"], $_POST["potId"]));
			$stmt = $dbh->prepare("DELETE FROM user2pot WHERE user_id = ? AND pot_id = ?");
			$stmt->execute(array($_POST["id"], $_POST["potId"]));
			if (!isParticipantInOtherPots($dbh, $_POST["id"])) {
				$stmt = $dbh->prepare("DELETE FROM user WHERE id = ?");
				$stmt->execute(array($_POST["id"]));
				// we don't need to delete the consumptions due to the cascading rule
			}
			$response["success"] = true;
			$response["message"] = "Der Teilnehmer wurde erfolgreich gel&ouml;scht.";
		} else {
			$response["success"] = false;
			$response["message"] = "Der Teilnehmer wurde nicht gel&ouml;scht, da er noch verwendet wird.";
		}
		$dbh->commit();
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim L&ouml;schen des Teilnehmers aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}

function isParticipantInUse($dbh, $userId, $potId) {
	$statement = $dbh->prepare("SELECT sum(c.amount) FROM consumption c INNER JOIN potposition p ON c.potposition_id = p.id WHERE c.user_id = ? AND p.pot_id = ?");
	$statement->execute(array($userId, $potId));
	$row = $statement->fetch(PDO::FETCH_NUM);
	$debt = $row[0];
	
	$statement = $dbh->prepare("SELECT count(*) FROM potposition WHERE payer_id = ? AND pot_id = ?");
	$statement->execute(array($userId, $potId));
	$row = $statement->fetch(PDO::FETCH_NUM);
	$credit = $row[0];
	$inUse = true;
	if (0 == $debt && 0 == $credit) {
		$inUse = false;
	}
	return $inUse;
}

function isParticipantInOtherPots($dbh, $userId) {
	$statement = $dbh->prepare("SELECT count(*) FROM user2pot WHERE user_id = ?");
	$statement->execute(array($userId));
	$row = $statement->fetch(PDO::FETCH_NUM);
	$inUse = true;
	if (0 == $row[0]) {
		$inUse = false;
	}
	return $inUse;
}

function changeProductOrder($dbh) {
	$response = array();
	try {
		$dbh->beginTransaction();
		for ($i = 0; $i < count($_POST["positions"]); $i++) {
			$stmt = $dbh->prepare("UPDATE potposition SET position = ? WHERE id = ? AND pot_id = ?;");
			$stmt->execute(array($i, substr($_POST["positions"][$i], 4), $_POST["potId"]));
		}
		$dbh->commit();
		$response["success"] = true;
		$response["message"] = "Die Aufgaben wurde erfolgreich sortiert.";
	} catch (Exception $e) {
		$dbh->rollBack();
		$response["success"] = false;
		$response["message"] = "Es ist ein Fehler beim Sortieren der Ausgaben aufgetreten.";
		$response["error"] = $e;
	}
	echo json_encode($response);
}
?>