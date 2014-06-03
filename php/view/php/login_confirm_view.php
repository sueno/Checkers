<?php $DEBUG = 1; 

    //テスト用配列　
    //本番は$_data,$groupListの宣言を削除
//    $data = array("users_name"=>"testID", "users_mail"=>"testmailadress@test.com", "users_password"=>"password", "groups_id"=>1);
//    $groupList = array(array("id"=>1,"name"=>"11期"),array("id"=>2,"name"=>"12期"),array("id"=>3,"name"=>"13期"));

    $groupList= $BEANS["groups"];
    $signupInfo = $data;

     //パス指定
//  $path="testPOSTview.php";
    $path="MainController.php";
  
//    $headPath="../css/";
    $headPath="view/css/"; 
     
    //グループIDからグループ名を取得
    $groupName="null";
    foreach($groupList as $bean)
    {
        if($bean["id"]==$data["groups_id"]) 
        {
            $groupName=$bean["name"];
            break;
        }
    }
    
?>

<html>
    <head>
        <?php 
    		require 'view/contents/headContents.php';
    	?>
    	
        <title>登録確認ページ</title>

    </head>


    <body>
        <div id="body">
            <h2>以下の内容で登録してもよろしいですか？</h2>
            <br>
            <table class="table table-bordered table-striped">
                
                <tr><td>ユーザーID</td><td><?php echo $signupInfo["users_name"]; ?></td></tr>
                <tr><td>メールアドレス</td><td><?php echo $signupInfo["users_mail"]; ?></td></tr>
                <tr><td>パスワード</td><td><?php echo $signupInfo["users_password"]; ?></td></tr>
                <tr><td>選択グループ</td><td><?php echo $groupName; ?></td></tr>
                
            </table>
            
            <form action="<?php echo $path; ?>?mode=signup_complete" method="POST">
            <input type=hidden name="users_name"          value="<?php echo $signupInfo["users_name"]; ?>">
            <input type=hidden name="users_mail"        value="<?php echo $signupInfo["users_mail"]; ?>">
            <input type=hidden name="users_password"    value="<?php echo $signupInfo["users_password"]; ?>">
            <input type=hidden name="groups_id"         value="<?php echo $signupInfo["groups_id"]; ?>">
            <input type="submit" value="登録">
        </div>
        <p><a href="#" onClick="history.back(); return false;">前のページにもどる</a></p>
    </body>
    
</html>