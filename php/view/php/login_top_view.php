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
	<div class="col-sm-4 col-sm-offset-1">

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
	<div class="col-sm-5 col-sm-offset-1">

<h2>ユーザー登録</h2>
<form action="<?php echo $path; ?>?mode=signup_confirm" method="POST">
<div class="input-group">
  <span class="input-group-addon">ログインID</span>
  <input type="text" class="form-control" name="users_name" placeholder="User Name">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">メールアドレス</span>
  <input type="text" class="form-control" name="users_mail" placeholder="E-Mail">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">パスワード</span>
  <input type="password" class="form-control" name="users_password" placeholder="Password">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">グループを選択</span>
  <select name="groups_id">
    <!-- アクションの連想配列名に変更-->
    <?php
        foreach($groupList as $bean) {
              echo "<option value=\"".$bean["id"]."\">".$bean["name"]."</option>";
        }
    ?>
    </select>
    </div>
<br />
<input type="submit" class="btn btn-default btn-lg" value="ユーザ登録" />
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