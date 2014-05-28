<?php $DEBUG = 1; ?>

<html>
<head>
<meta charset="utf-8">
<title>ログインページ</title>
<link href="../css/login_view.css" rel="stylesheet" type="text/css">
</head>


<body>

<h1>ログインページ</h1>
<div id ="left">
<h2>ログイン</h2>
<form action="../controler.php" method="POST">
<table>
    <tr><td>ログインID:</td><td><input type="text" name="users_id"><td></tr>
    <tr><td>パスワード:</td><td><input type="text" name="users_password"><td></tr>
    <tr><td></td><td><input type="submit" value="ログイン" ></td></tr>
</table>
</form>
</div>


<div id ="right">
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
            $BEANS = array("groups"=>array(0=>array("id"=>1,"name"=>"11期"),1=>array("id"=>2,"name"=>"12期")));
            
        $groupsBeans = $BEANS["group"];
//        var_dump($groupsBeans);
        foreach($groupsBeans as $bean)
        {
                foreach($bean as $key=>$value)
                    echo "<option value=\"".$key."\">".$value."</option>";

        }
    
    ?>
    </select><td></tr>
    <tr><td></td><td><input type="submit" value="ユーザー登録" ></td></tr>
</table>
</form>
</div>

<?php

 //   var_dump($BEANS);?>

</body>
</html>



<?php


?>