<?php

echo "<br>------ require ----------<br>";

require_once '../../php/dao/MemberDao.php';

echo "<br>------ new DAO instance ----------<br>";
$dao = new MemberDao();


echo "<br>------ connect ----------<br>";
$dao->connect();


echo "<br>------ select ----------<br>";
$res = $dao->select(array("group_id"=>"2"));
echo "<br>";
print_r($res);

echo "<br>------ select ----------<br>";
$res = $dao->select(array("group_id"=>17));
echo "<br>";
print_r($res);

echo "<br>------ end ----------<br>";

?>