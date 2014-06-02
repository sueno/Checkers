<?php

echo "<br>------ require ----------<br>";

require_once '../../php/dao/ReportDao.php';

echo "<br>------ new DAO instance ----------<br>";
$dao = new ReportDao();


echo "<br>------ connect ----------<br>";
$dao->connect();


echo "<br>------ select ----------<br>";
$res = $dao->select(array("contents_id"=>1));
echo "<br>";
print_r($res);

echo "<br>------ select ----------<br>";
$res = $dao->select(array("contents_id"=>0));
echo "<br>";
print_r($res);

echo "<br>------ end ----------<br>";

?>