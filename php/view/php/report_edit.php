<?php $DEBUG = 1; 

        //テスト用配列　結合時にはコメントアウト
    $session = array("user_name"=>"有安杏果","group_name"=>"１１期", "user_id"=>3,"group_id"=>1); 
    
    $report = array("content_id"=>1,
                    "title"=>"【日報】20140529", 
                    "user_id"=>1,
                    "user_name"=>"百田",    
                    "body"=>"ニューシングル、泣いてもいいんだよが5月8日発売ということで！6日、7日、8日と全国いろんなところに行ってきましたぁ!!名古屋、滋賀、山形、新潟、仙台、盛いやぁ～楽しかった(*゜▽゜*)それぞれの地域の色があって、どこに行っても楽しい方々ばかりで…（´∀`*）笑いすぎてお腹が筋肉痛になったの久しぶり！笑モノノフさんにもたくさん会えて(*´艸｀)ふふみんなありがとねーん！(。-∀-)「泣いてもいいんだよ」たくさん聞いてください(＾＾)", 
                    "content_date"=>'2014-05-29', "comment_num"=>5
                    );

                        
     //パス指定
  $path="testPOSTview.php";
//    $path="MainController.php";
  
    $headPath="../css/";
//    $headPath="view/css/"; 

    $userInfo = $session; 
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>日報編集ページ</title>
        <link href="<?php echo $headPath; ?>menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $headPath; ?>report_edit.css" rel="stylesheet" type="text/css">
  
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
        <h1>日報編集ページ</h1>
		<?php 
		if(ISSET($report))		//日報編集の場合
		{	?>
            <table border="1">
                <form method="POST" action="<?php echo $path; ?>?mode=individual_reports">
                <tr><td>タイトル：</td> <td><input type="text" name="title" value="<?php echo $report["title"]; ?>" size="50"></td>
                    <td>作成日:</td>    <td><input type="text" name="content_date" value="<?php echo $report["content_date"]; ?>" size="50"></td></tr>
                    
                <tr><td colspan="4"><textarea name="body"  rows="30" cols="100"><?php echo $report["body"]; ?></textarea></td></tr>
            </table>
            <INPUT TYPE="HIDDEN" NAME="content_ID" VALUE="<?php ECHO $report["content_id"];?>">
            <input type="submit" value="投稿する"></form>
        <?php } 
        
        ELSE		//新規作成の場合
        {?>
        	<table border="1">
        	<form method="POST" action="<?php echo $path; ?>?mode=individual_reports">
        	<tr><td>タイトル：</td> <td><input type="text" name="title"  size="50"></td>
        	<td>作成日:</td>    <td><input type="text" name="content_date" value="<?php echo date('Y-m-d'); ?>" size="50"></td></tr>
        	
        	<tr><td colspan="4"><textarea name="body"  rows="30" cols="100">本文をここに入力</textarea></td></tr>
        	</table>
        	
        	<input type="submit" value="投稿する"></form>
        
        <?php }?>
            
            <br>
            <br>

            
        </div>
        
    </body>
</html>