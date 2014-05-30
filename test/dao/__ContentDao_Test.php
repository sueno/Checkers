<?php

echo "<br>------ require ----------<br>";

require_once '../../php/dao/ContentDao.php';

echo "<br>------ new DAO instance ----------<br>";
$dao = new ContentDao();


echo "<br>------ connect ----------<br>";
$dao->connect();


echo "<br>------ select ----------<br>";
$res = $dao->select();
print_r($res);


echo "<br>------ insert ----------<br>";
$dao->insert(array("contains_user_id","contents_title","contents_body","contents_date","contents_kind"));
echo $dao->getResultCheck();


echo "<br>------ select ----------<br>";
$res = $dao->select();
print_r($res);


echo "<br>------ end ----------<br>";

?>