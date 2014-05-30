<?php

echo "<br>------ require ----------<br>";

require_once '../../php/dao/GroupDao.php';

echo "<br>------ new DAO instance ----------<br>";
$dao = new GroupDao();


echo "<br>------ connect ----------<br>";
$dao->connect();


echo "<br>------ select ----------<br>";
$res = $dao->select();
print_r($res);


echo "<br>------ insert ----------<br>";
$dao->insert(array("groups_name"=>"2100"));
echo $dao->getResultCheck();


echo "<br>------ select ----------<br>";
$res = $dao->select();
print_r($res);


echo "<br>------ end ----------<br>";

?>