<?php
require 'Smarty/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty->assign('rootpath', 'http://'.$_SERVER['HTTP_HOST'].'/gfm');
//echo "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//print_r($_GET);

if (isset($_GET['pot'])) {
	// TODO auch noch schauen ob item gesetzt oder teilnehmer...
	$smarty->assign('title','Pot ljsf');
	$smarty->assign('newPot', false);
	$smarty->assign('displayedPage', $_GET["page"]);
	$smarty->assign('pot', array('name' => 'Testpot', 'startDate' => '10.10.2013', 'endDate' => '12.12.2013', 'url' => 'ic0sati0nybxgp1', 'description' => 'blablabla'));
	$smarty->assign('users',
			array(
					array('id' => '1', 'name' => 'user1', 'firstname' => 'first1', 'email' => 'first1@user1.ch', 'birthday' => '01.01.1989', 'pay' => 0.0, 'use' => 0.0),
					array('id' => '2', 'name' => 'user2', 'firstname' => 'first2', 'email' => 'first2@user2.ch', 'birthday' => '01.01.1990', 'pay' => 0.0, 'use' => 0.0),
					array('id' => '3', 'name' => 'user3', 'firstname' => 'first3', 'email' => 'first3@user3.ch', 'birthday' => '01.01.1991', 'pay' => 0.0, 'use' => 0.0),
					array('id' => '4', 'name' => 'user4', 'firstname' => 'first4', 'email' => 'first4@user4.ch', 'birthday' => '01.01.1992', 'pay' => 0.0, 'use' => 0.0),
			)
	);
	$smarty->assign('products',
			array(
					array('rowId' => "row_0", 'price' => 8.00, 'name' => '4 Liter Milch', 'date' => '01.01.2013', 'buyer' => 'user1', 'user1' => 0.75, 'user2' => 0, 'user3' => 0.25, 'user4' => 0)
			)
	);
	$smarty->display('index.tpl');
} else {
	// TODO "leere" seite nur button pot erstellen
	$smarty->assign('title','GFM - Gruppenfinanzverwaltung');
	$smarty->assign('newPot', true);
}



 // TODO generating random url
/*$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$random_string_length = 15;
$string = '';
for ($i = 0; $i < $random_string_length; $i++) {
$string .= $characters[rand(0, strlen($characters) - 1)];
}
echo $string;*/
?>