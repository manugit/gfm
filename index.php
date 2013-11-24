<?php
require 'Smarty/libs/Smarty.class.php';
require 'dbConnection.php';

$smarty = new Smarty;
$smarty->assign('rootpath', 'http://'.$_SERVER['HTTP_HOST'].'/gfm');

if (isset($_GET['pot']) && isset($_GET['page'])) {
	// TODO fehlerhandling wenn nichts gefunden wurde... bei allen bereichen
	// assign global variables
	$smarty->assign('newPot', false);
	$smarty->assign('displayedPage', $_GET["page"]);
	
	// assign pot
	$stmt = $dbh->prepare("SELECT id, name, description, DATE_FORMAT(startdate, '%d.%m.%Y') AS startDate, DATE_FORMAT(enddate,'%d.%m.%Y') AS endDate, url_hash AS url FROM pot WHERE url_hash = ?;");
	$stmt->bindParam(1, $_GET['pot']);
	$stmt->execute();
	$pot = $stmt->fetch(PDO::FETCH_ASSOC);
	$smarty->assign('pot', $pot);
	$smarty->assign('title','Pot: '.$pot["name"]);
	
	// assign participants
	$sql = "SELECT u.id, u.nickname, u.name, u.firstname, u.email, DATE_FORMAT(u.birthdate, '%d.%m.%Y') AS birthday, 0 AS pay, 0 AS 'use' ";
	$sql .= "FROM user u INNER JOIN user2pot u2p ON u.id = u2p.user_id ";
	$sql .= "WHERE u2p.pot_id = ?";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(1, $pot["id"]);
	$stmt->execute();
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$smarty->assign('users', $users);
	
	// assign products
	$sql = "SELECT CONCAT('row_', product.id) AS rowId, product.description AS name, product.amount AS price, DATE_FORMAT(product.date, '%d.%m.%Y') AS date, u.nickname AS buyer, product.position ";
	$sql .= "FROM potposition product INNER JOIN user u ON u.id = product.payer_id ";
	$sql .= "WHERE product.pot_id = ? ORDER BY product.position";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(1, $pot["id"]);
	$stmt->execute();
	$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	$sql = "SELECT c.id, c.amount, CONCAT('row_', c.potposition_id) AS potposition_id, u.name FROM consumption c INNER JOIN user u ON u.id = c.user_id ";
	$sql .= "WHERE potposition_id IN (SELECT id FROM potposition WHERE pot_id = ?)";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(1, $pot["id"]);
	$stmt->execute();
	$consumptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	for ($i = 0; $i < count($products); $i++) {
		for ($j = 0; $j < count($consumptions); $j++) {
			if ($products[$i]["rowId"] == $consumptions[$j]["potposition_id"]) {
				$products[$i][$consumptions[$j]["name"]] = $consumptions[$j]["amount"];
			}
		}
	}
	$smarty->assign('products', $products);
	
	// assign edit item if isset
	if (isset($_GET['item'])) {
		$sql = "SELECT CONCAT('row_', product.id) AS rowId, product.description AS name, product.amount AS price, DATE_FORMAT(product.date, '%d.%m.%Y') AS date, u.nickname AS buyer ";
		$sql .= "FROM potposition product INNER JOIN user u ON u.id = product.payer_id ";
		$sql .= "WHERE product.pot_id = ? and product.id = ?";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(1, $pot["id"]);
		$stmt->bindParam(2, $_GET['item']);
		$stmt->execute();
		$product = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$sql = "SELECT c.id, c.amount, CONCAT('row_', c.potposition_id) AS potposition_id, u.name FROM consumption c INNER JOIN user u ON u.id = c.user_id ";
		$sql .= "WHERE potposition_id = ?";
		$stmt = $dbh->prepare($sql);
		$stmt->bindParam(1, $_GET['item']);
		$stmt->execute();
		$consumptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		for ($i = 0; $i < count($consumptions); $i++) {
			$product[$consumptions[$i]["name"]] = $consumptions[$i]["amount"];
		}
		$smarty->assign('editProduct', $product);
	}
	
} else {
	// TODO "leere" seite nur button pot erstellen
	$smarty->assign('title','GFM - Gruppenfinanzverwaltung');
	$smarty->assign('newPot', true);
}
$smarty->display('index.tpl');
?>