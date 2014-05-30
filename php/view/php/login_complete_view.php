<?php $DEBUG = 1; 

    //テスト用配列　
    //本番は$_dataの宣言を削除する
    $data = array("users_id"=>"testID", "users_mail"=>"testmailadress@test.com", "users_password"=>"password", "groups_id"=>1);
    $groupList = array(array("id"=>1,"name"=>"11期"),array("id"=>2,"name"=>"12期"),array("id"=>3,"name"=>"13期"));
    $signupInfo = $data;
    
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
        <title>グループページ</title>
        <link href="../css/login_confirm_view.css" rel="stylesheet" type="text/css">
        <meta http-equiv="refresh" content="10;URL=../controler.php">

    </head>


    <body>
        <div id="body">
            <h2>以下の内容で登録しました</h2>
            <br>
            <table>
                
                <tr><td>ユーザーID</td>         <td><?php echo $signupInfo["users_id"]; ?></td></tr>
                <tr><td>メールアドレス</td>     <td><?php echo $signupInfo["users_mail"]; ?></td></tr>
                <tr><td>パスワード</td>         <td><?php echo $signupInfo["users_password"]; ?></td></tr>
                <tr><td>選択グループ</td>       <td><?php echo $groupName; ?></td></tr>
                
            </table>
            
 
        </div>
        <p>10秒後に自動的にトップページに転送します</p>
        
    </body>
    
</html>