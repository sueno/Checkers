<?php

require '../../php/dao/DaoSuper.php';

$ip = getenv("REMOTE_ADDR") ; 
echo "Your IP is  __   " . $ip;
echo $C9_USER;
echo "<br>----------------<br>";

$dao = new DaoSuper();

$dao->connect();

$res = $dao->selectTable("groups");

print_r($res);
echo "<br>----------------<br>";

echo "indert<br>";

$dao->insertTable("groups","null,null");
echo $dao->resultCheck;
echo "<br>----------------<br>";


$res = $dao->selectTable("groups");

print_r($res);
echo "<br>----------------<br>";



?>