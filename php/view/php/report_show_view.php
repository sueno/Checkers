<?php
     //パス指定
    $path="MainController.php";
    $headPath="view/css/"; 
    
    // initialize
    $userInfo = $_SESSION; 
    $report=$BEANS ["content"][0];
?>

<html>
  <head>
    <?php require 'view/contents/headContents.php'; ?>
    <title>日報閲覧ページ</title>
  </head>
  <body>
    <?php require 'view/contents/header.php'; ?>
    <div class="body_part">
      <h1>日報閲覧ページ</h1>
      <?php
      // 閲覧者と投稿者が同じ場合には編集ボタンを作る 
      // var_dump($userInfo);
      if($userInfo["user_id"]==$report["user_id"]) {
      ?>
        <form action="<?php echo $path."?mode=report_manage"; ?>" method="POST">
          <input  type="hidden" name="content_id" value="<?php echo $report["content_id"]; ?>" />
          <div align="right"><input type="submit" value="編集" /></div>
        </form>
      <?php } ?>
      
      <!-- 日報表示部 -->
      <table border="1" class="table table-bordered table-striped">
        <tr>
          <td><?php echo $report["title"]; ?></td><td><?php echo $report["content_date"]; ?></td><td><?php echo $report["user_name"]; ?></td>
        </tr>
        <tr>
          <td colspan="3"><?php echo $report["body"]; ?></td>
        </tr>
      </table>
      
      <br>
      <br>
      
      <h2>コメント</h2>
            
      <div id="comment-list"></div>
      
      <br>
      
      <h2>コメントする</h2>
      <form id="comment" action="MainController.php?mode=comment_add" method="post">
        <input  type="hidden"  name="comments_contents_id" value="<?php echo $report["content_id"]; ?>"> 
		<input type="hidden" name="comments_poster" value="<?php echo $report["user_id"]; ?>" />
        <textarea id="input-comment" placeholder="コメントを入力してください" name="comments_body" style="width:400px; height:150px;"></textarea>
		<input id="comment-btn" type="button" value ="送信">
      </form>
             
      <form id="comment-show" action="MainController.php?mode=comment_show" method="post">
        <input  type="hidden"  name="comments_contents_id" value="<?php echo $report["content_id"]; ?>">
      </form>
    </div>
  </body>
</html>

<script type="text/javascript" src="view/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="view/js/report_show_view.js"></script>
               