<?php $DEBUG = 1; 

    //テスト用配列　
    //本番は$_data,$groupListの宣言を削除する
//    $data = array("users_name"=>"testID", "users_mail"=>"testmailadress@test.com", "users_password"=>"password", "groups_id"=>1);
//    $groupList = array(array("id"=>1,"name"=>"11期"),array("id"=>2,"name"=>"12期"),array("id"=>3,"name"=>"13期"));

    //BEANS代入
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
        <meta charset="utf-8">
        <title>登録完了ページ</title>
        <link href="<?php echo $headPath; ?>login_confirm_view.css" rel="stylesheet" type="text/css">
        <meta http-equiv="refresh" content="5;URL=<?php echo $path; ?>?mode=individual_reports">

    </head>


    <body>
        <div id="body">
            <h2>以下の内容で登録しました</h2>
            <br>
            <table>
                
                <tr><td>ユーザーID</td>         <td><?php echo $signupInfo["users_name"]; ?></td></tr>
                <tr><td>メールアドレス</td>     <td><?php echo $signupInfo["users_mail"]; ?></td></tr>
                <tr><td>パスワード</td>         <td><?php echo $signupInfo["users_password"]; ?></td></tr>
                <tr><td>選択グループ</td>       <td><?php echo $groupName; ?></td></tr>
                
            </table>
            
 
        </div>
        <p>5秒後に自動的にトップページに転送します</p>
        
    </body>
    
</html>