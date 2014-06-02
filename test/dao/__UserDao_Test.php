<?php

echo "<br>------ require ----------<br>";

require_once '../../php/dao/UserDao.php';

echo "<br>------ new DAO instance ----------<br>";
$dao = new UserDao();


echo "<br>------ connect ----------<br>";
$dao->connect();


echo "<br>------ select ----------<br>";
$res = $dao->select();
print_r($res);


echo "<br>------ insert ----------<br>";
$dao->insert(array("users_name"=>"test01","users_mail"=>"test01@mail","users_password"=>"1111","groups_id"=>2));
echo $dao->getResultCheck();


echo "<br>------ select ----------<br>";
$res = $dao->select();
print_r($res);


echo "<br>------ end ----------<br>";

?>