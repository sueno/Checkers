<?php

$ip = getenv("REMOTE_ADDR") ; 
echo "Your IP is  __   " . $ip;
echo $C9_USER;
echo "----------------";

$dao = new DaoSuper();

$dao->connect();

$res = $dao->selectTable("groups");

print_r($res);

echo "indert";

$dao->insertTable("groups","null,'2000'");


$res = $dao->selectTable("groups");

print_r($res);



?>