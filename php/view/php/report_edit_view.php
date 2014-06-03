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
?>

<html>
  <head>
    <?php require 'view/contents/headContents.php'; ?>
    <title>日報編集ページ</title>
  </head>
  <body>
    <?php require 'view/contents/header.php'; ?>
    <div class="body_part">
      <h1>日報編集ページ</h1>
      <?php $report=$BEANS['contents'][0]; ?>
      <form method="post" action="<?php echo $path; ?>?mode=report_manage_save">
        <table class="table table-bordered table-striped">      
          <tr>
            <td>タイトル：</td><td><input type="text" name="contents_title" value="<?php echo isset($report["title"]) ? $report["title"] : "" ; ?>" size="50" /></td>
            <td>作成日:</td><td><input type="text" name="contents_content_date" value="<?php echo isset($report["content_date"]) ? $report["content_date"] : ""; ?>" size="50" /></td>
          </tr>          
          <tr>
            <td colspan="4">
              <textarea name="contents_body" rows="30" cols="100" placeholder="本文をここに入力"><?php echo isset($report["body"]) ? $report["body"] : ""; ?></textarea>
            </td>
          </tr>
          <input type="hidden" name="contents_user_id" value="<?php echo isset($report["user_id"]) ? $report["user_id"] : "";?>" />
          <input type="hidden" name="contents_id" value="<?php echo isset($report["id"]) ? $report["id"] : "";?>" />
          <input type="submit" value="投稿する" />
        </table>
      </form>
      
      <br>
      <br>
      
    </div>   
  </body>
</html>