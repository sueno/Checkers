<?php

echo "hoge";

$dao = new DaoSuper();

$dao->connect();

$res = $dao->selectTable("groups");

print_r($res);

$dao->insertTable("groups","null,'2000'");


$res = $dao->selectTable("groups");

print_r($res);



?>