<?php

echo "<br>----------------<br>";

require_once '../../php/dao/UserDao.php';

echo "<br>----------------<br>";

$dao = new UserDao();


echo "<br>----------------<br>";
$dao->connect();

$res = $dao->select();

print_r($res);
echo "<br>----------------<br>";

echo "insert<br>";

$dao->insert(array("users_name"=>"test01","users_mail"=>"test01@mail","users_password"=>"1111","group_id"=>"0"));
echo $dao->resultCheck;
echo "<br>----------------<br>";


$res = $dao->select();

print_r($res);
echo "<br>----------------<br>";

?>