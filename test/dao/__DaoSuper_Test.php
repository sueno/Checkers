<?php

require '../../php/dao/DaoSuper.php';

$ip = getenv("REMOTE_ADDR") ; 
echo "Your IP is  __   " . $ip;
echo $C9_USER;
echo "<br>----------------1<br>";

$dao = new DaoSuper();
echo "<br>----------------2<br>";

$dao->connect();

$res = $dao->selectTable("groups");

print_r($res);
echo "<br>----------------3<br>";

echo "insert<br>";

$dao->insertTable("groups","null,null");
echo $dao->resultCheck;
echo "<br>----------------<br>";


$res = $dao->selectTable("groups");

print_r($res);
echo "<br>----------------<br>";



?>