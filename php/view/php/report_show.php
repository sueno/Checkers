<?php $DEBUG = 1; 

        //テスト用配列　
    $session = array("user_name"=>"有安杏果","group_name"=>"１１期", "user_id"=>2,"group_id"=>1); 
    
    $report = array("content_id"=>1,
                    "title"=>"【日報】20140529", 
                    "user_id"=>3,
                    "user_name"=>"百田",    
                    "body"=>"ニューシングル、泣いてもいいんだよが5月8日発売ということで！6日、7日、8日と全国いろんなところに行ってきましたぁ!!名古屋、滋賀、山形、新潟、仙台、盛いやぁ～楽しかった(*゜▽゜*)それぞれの地域の色があって、どこに行っても楽しい方々ばかりで…（´∀`*）笑いすぎてお腹が筋肉痛になったの久しぶり！笑モノノフさんにもたくさん会えて(*´艸｀)ふふみんなありがとねーん！(。-∀-)「泣いてもいいんだよ」たくさん聞いてください(＾＾)", 
                    "content_date"=>'2014-05-29', 
                    "comment_num"=>5
                    );
    $comments = array(  array("user_name"=>"武士", "content"=>"いいね。見習いたい", "user_id"=>5, "date"=>'2014-05-29'), 
                        array("user_name"=>"モノノフ", "content"=>"あーりんわっしょい","user_id"=>6, "date"=>'2014-05-29'), 
                        array("user_name"=>"ぼへみあ", "content"=>"こんにちは。","user_id"=>7, "date"=>'2014-05-29'),
                    );
                        
     //パス指定
//   $path="testPOSTview.php";
    $path="MainController.php";
  
//    $headPath="../css/";
    $headPath="view/css/"; 

    $userInfo = $_SESSION; 
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>日報閲覧ページ</title>
        <link href="<?php echo $headPath; ?>menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $headPath; ?>report_show.css" rel="stylesheet" type="text/css">
  
     </head>


    <body>

        <div id="menu">
            <ul>
                <li><a href="" onclick="window.document.menuForm1.submit(); return false;" >個人ページ</a>
                    <form name="menuForm1" method="POST" action="<?php echo $path; ?>?mode=individual_reports">
                    <input type="hidden" name="user_id" value="<?php echo $userInfo["user_id"]; ?>">
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
 

                <li><a href=""><font id="info"><?php echo $userInfo["user_name"]?><br><?php echo $userInfo["group_name"]?></font></a>
                </li>
            </ul>
        </div>
        <br>
        
        
        <div class="body_part">
        <h1>日報閲覧ページ</h1>
        <?php
            //閲覧者と投稿者が同じ場合には編集ボタンを作る 
            if($userInfo["user_id"]==$report["user_id"])
                {
                    ?>
                 <form action="<?php echo $path."?mode=report_edit"; ?>" method="POST">
                    <input  type="hidden" name="content_id" value="<?php echo $report["content_id"]; ?> ">
                    <div align="right"><input type="submit" value="編集"></div>
                </form>
        
        <?php } ?>
        
        
        
            <table border="1">
                <tr><td><?php echo $report["title"]; ?></td><td><?php echo $report["content_date"]; ?></td><td><?php echo $report["user_name"]; ?></td></tr>
                <tr><td colspan="3"><?php echo $report["body"]; ?></td></tr>
            </table>
            <br>
            <br>
            <h2>コメント</h2>
            <table>
            <?php foreach($comments as $temp) {?>
                <tr><td>名前</td><td><?php echo $temp["user_name"]?></td></tr>
                <tr><td></td><td><?php echo $temp["content"]?></td></tr>
            <?php }?>
            </table>
            <br>
            <h2>コメントする</h2>
            <form action="<?php echo $path."?mode=report_edit"; ?>" method="POST">
                    <input  type="hidden" name="content_id" value="<?php echo $report["content_id"]; ?> ">
                    <input  type="textarea" name="body" style="width:400px; height:150px;">
                    <div><input type="submit" value="送信"></div>
            </form>
            
            
            
            <!-- ここに非同期通信の処理を追加 -->
            <script>
            var xmlHttpRequest= new XMLHttpRequest();;

       	 	 // XMLHttpRequest オブジェクトを作成
         	var xhr = XMLHttpRequestCreate();
         
            xhr.open("POST" , "<?php echo $path;?>" + "?mode=comment_show"  );

        	var form_data = new FormData();

        	// ------------------------------------------------------------
        	// 名前と値を指定してデータを格納する
        	// ------------------------------------------------------------
        	form_data.append("content_id","<?php echo $report["content_id"];?>");

        	xhr.send(form_data);
			</script>
            
        </div>
        
    </body>
</html>
               
               
               