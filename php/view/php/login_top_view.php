<?php $DEBUG = 1; ?>

<html>
<head>
<meta charset="utf-8">
<title>ログインページ</title>
<link href="../css/login_view.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>


<body>

<h1>ログインページ</h1>

<div id="main">

<div id ="left" Align="left">
<h2>ログイン</h2>
<form action="../controler.php" method="POST">
<table>
    <tr><td>ログインID:</td><td><input type="text" name="users_id"><td></tr>
    <tr><td>パスワード:</td><td><input type="text" name="users_password"><td></tr>
    <tr><td></td><td><input type="submit" value="ログイン" ></td></tr>
</table>
</form>
</div>


<div id ="right" Align="right">
<h2>ユーザー登録</h2>
<form action="../controler.php" method="POST">
<table>
    <tr><td>ユーザーID:</td><td><input type="text" name="users_id"><td></tr>
    <tr><td>パスワード:</td><td><input type="text" name="users_password"><td></tr>
    <tr><td>グループを選択:</td><td><select name="groups_id">
    <!-- アクションの連想配列名に変更-->
    <?php
        //テスト用配列　
//        if (defined('DEBUG'))
            $BEANS = array("groups"=>  array(array("id"=>1,"name"=>"11期"),array("id"=>2,"name"=>"12期"),array("id"=>3,"name"=>"13期")));
            
        $groupsBeans = $BEANS["groups"];
//        var_dump($groupsBeans);
        foreach($groupsBeans as $bean)
        {
            
              echo "<option value=\"".$bean["id"]."\">".$bean["name"]."</option>";

        }
    
    ?>
    </select><td></tr>
    <tr><td></td><td><input type="submit" value="ユーザー登録" ></td></tr>
</table>
</form>
</div>
</div>
<?php

 //   var_dump($BEANS);?>

</body>
</html>



<?php


?>