<?php $DEBUG = 1; 

        //テスト用配列　結合時にはコメントアウト
//     $session = array("user_name"=>"有安杏果","group_name"=>"１１期", "user_id"=>3,"group_id"=>1); 
    
//     $report = array("content_id"=>1,
//                     "title"=>"【日報】20140529", 
//                     "user_id"=>1,
//                     "user_name"=>"百田",    
//                     "body"=>"ニューシングル、泣いてもいいんだよが5月8日発売ということで！6日、7日、8日と全国いろんなところに行ってきましたぁ!!名古屋、滋賀、山形、新潟、仙台、盛いやぁ～楽しかった(*゜▽゜*)それぞれの地域の色があって、どこに行っても楽しい方々ばかりで…（´∀`*）笑いすぎてお腹が筋肉痛になったの久しぶり！笑モノノフさんにもたくさん会えて(*´艸｀)ふふみんなありがとねーん！(。-∀-)「泣いてもいいんだよ」たくさん聞いてください(＾＾)", 
//                     "content_date"=>'2014-05-29', "comment_num"=>5
//                     );

                        
     //パス指定
//  $path="testPOSTview.php";
    $path="MainController.php";
  
//    $headPath="../css/";
    $headPath="view/css/"; 

    $userInfo = $_SESSION;
    //BEANSを代入

    
?>

<html>
    <head>
        <?php 
    		require 'view/contents/headContents.php';
    	?>
        <title>日報編集ページ</title>
     </head>


    <body>
    <?php 
    	$headerHTML = 'view/contents/header.php';
    	$bodyHTML = 'view/contents/reportManage.php';
    	$footerHTML = '';
    	
    	require 'view/layout/singleContentLayout.php';
    ?>
        
    </body>
</html>