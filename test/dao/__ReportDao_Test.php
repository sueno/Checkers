<?php

echo "<br>------ require ----------<br>";

require_once '../../php/dao/ContentDao.php';

echo "<br>------ new DAO instance ----------<br>";
$dao = new ContentDao();


echo "<br>------ connect ----------<br>";
$dao->connect();


echo "<br>------ select ----------<br>";
$res = $dao->select();
echo "<br>";
print_r($res);


echo "<br>------ insert ----------<br>";
$dao->insert(array("contains_user_id"=>7,"contents_title"=>"report01-user03","contents_body"=>"hogehuga","contents_date"=>"2014-05-30","contents_kind"=>0));
echo $dao->getResultCheck();


echo "<br>------ select ----------<br>";
$res = $dao->select();
echo "<br>";
print_r($res);


echo "<br>------ end ----------<br>";

?>