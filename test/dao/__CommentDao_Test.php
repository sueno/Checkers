<?php

echo "<br>------ require ----------<br>";

require_once '../../php/dao/CommentDao.php';

echo "<br>------ new DAO instance ----------<br>";
$dao = new CommentDao();


echo "<br>------ connect ----------<br>";
$dao->connect();


echo "<br>------ select ----------<br>";
$res = $dao->select();
echo "<br>";
print_r($res);


echo "<br>------ insert ----------<br>";
$dao->insert(array("comments_contents_id"=>1,"comments_poster"=>5,"comments_body"=>"piyopiyo"));
echo $dao->getResultCheck();


echo "<br>------ select ----------<br>";
$res = $dao->select();
echo "<br>";
print_r($res);


echo "<br>------ end ----------<br>";

?>