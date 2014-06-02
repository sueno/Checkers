<?php $DEBUG = 1; 

        //テスト用配列　
    $session = array("name"=>百田,"group"=>"１１期"); 
    
    $report = array("content_id"=>1,
                    "title"=>"【日報】20140529", 
                    "user_id"=>1,
                    "user_name"=>"百田",    
                    "body"=>"ニューシングル、泣いてもいいんだよが5月8日発売ということで！6日、7日、8日と全国いろんなところに行ってきましたぁ!!名古屋、滋賀、山形、新潟、仙台、盛いやぁ～楽しかった(*゜▽゜*)それぞれの地域の色があって、どこに行っても楽しい方々ばかりで…（´∀`*）笑いすぎてお腹が筋肉痛になったの久しぶり！笑モノノフさんにもたくさん会えて(*´艸｀)ふふみんなありがとねーん！(。-∀-)「泣いてもいいんだよ」たくさん聞いてください(＾＾)", 
                    "date"=>'2014-05-29', "comment_num"=>5
                    );
    $comments = array(  array("user_name"=>"武士", "content"=>"いいね。見習いたい"), 
                        array("user_name"=>"モノノフ", "content"=>"あーりんわっしょい"), 
                        array("user_name"=>"ぼへみあ", "content"=>"こんにちは。"),
                    );
                        
    $path="testPOSTview.php";
//  $path="../../MainController.php";    
    $userInfo = $session; 
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>日報編集ページ</title>
        <link href="../css/menu.css" rel="stylesheet" type="text/css">
        <link href="../css/report_edit.css" rel="stylesheet" type="text/css">
  
     </head>


    <body>

        <div id="menu">
            <ul>
                <li><a href="" onclick="window.document.menuForm1.submit(); return false;" >個人ページ</a>
                    <form name="menuForm1" method="POST" action="<?php echo $path; ?>?mode=individual_reports">
                    </form>
                </li>


                <li><a href="" onclick="document.menuForm2.submit();return false;">グループページ</a>
                    <form name="menuForm2" method="POST" action="<?php echo $path; ?>?mode=group_reports">
                    </form>
                </li>


                <li><a href="" onclick="document.menuForm3.submit(); return false;">日報投稿</a>
                       <form name="menuForm3" method="POST" action="<?php echo $path; ?>?mode=report_edit">
                        </form>
                </li>
 

                <li><a href=""><font id="info"><?php echo $userInfo["name"]?><br><?php echo $userInfo["group"]?></font></a>
                </li>
            </ul>
        </div>
        <br>
        
        
        <div class="body_part">
        <h1>日報編集ページ</h1>


            <table border="1">
                <form method="POST" action="<?php echo $path; ?>?mode=individual_reports">
                <tr><td>タイトル：</td> <td><input type="text" name="title" value="<?php echo $report["title"]; ?>" size="50"></td>
                    <td>作成日:</td>    <td><input type="text" name="date" value="<?php echo $report["date"]; ?>" size="50"></td></tr>
                    
                <tr><td colspan="4"><textarea name="body"  rows="30" cols="100">本文をここに入力</textarea></td></tr>
            </table>
            <input type="submit" value="投稿する"></form>
            
            <br>
            <br>

            
        </div>
        
    </body>
</html>