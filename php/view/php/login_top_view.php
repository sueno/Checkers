<?php $DEBUG = 1; 

        //テスト用配列　
// var_dump($BEANS);


    $groupList= $BEANS["groups"];
//    $groupList = array(array("id"=>1,"name"=>"11期"),array("id"=>2,"name"=>"12期"),array("id"=>3,"name"=>"13期"));
//    $path="testPOSTview.php";
    $path="MainController.php";   
?>

<html>
<head>
        <?php 
    		require 'view/contents/headContents.php';
    	?>
        
<title>ログインページ</title>
</head>


<body>

<h1>ログインページ</h1>

<div id="main">

<div class="row">
	<!-- sideber -->
	<div class="col-sm-6">

<h2>ログイン</h2>
<form action="<?php echo $path; ?>?mode=group_reports" method="POST">
<div class="input-group">
  <span class="input-group-addon">ログインID</span>
  <input type="text" class="form-control" name="users_name" placeholder="User Name">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">パスワード</span>
  <input type="password" class="form-control" name="users_password" placeholder="Password">
</div>
<br />
<input type="submit" class="btn btn-default btn-lg" value="ログイン" />
</form>

</div>
<div class="col-sm-6">

<h2>ユーザー登録</h2>
<form action="<?php echo $path; ?>?mode=signup_confirm" method="POST">
<div class="input-group">
  <span class="input-group-addon">ログインID</span>
  <input type="text" class="form-control" name="users_name" placeholder="User Name">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">メールアドレス</span>
  <input type="password" class="form-control" name="users_password" placeholder="E-Mail">
</div>
<div class="input-group">
  <span class="input-group-addon">パスワード</span>
  <input type="password" class="form-control" name="users_password" placeholder="Password">
</div>
<table>
    <tr><td>ユーザーID:</td><td><input type="text" name="users_name"><td></tr>
    <tr><td>メールアドレス:</td><td><input type="text" name="users_mail"><td></tr>
    <tr><td>パスワード:</td><td><input type="text" name="users_password"><td></tr>
    <tr><td>グループを選択:</td><td><select name="groups_id">
    <!-- アクションの連想配列名に変更-->
    <?php
        foreach($groupList as $bean) {
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