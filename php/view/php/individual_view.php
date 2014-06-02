<?php $DEBUG = 1; 

    //テスト用配列　
    $session = array("user_name"=>"有安杏果","group_name"=>"１１期", "user_id"=>3,"group_id"=>1); 

    $reports = array(   array("content_id"=>1,"title"=>"【日報】20140529",       "body"=>"今日は暑かった。日傘ほしい", "content_date"=>'2014-05-29', "comment_num"=>5),
                        array("content_id"=>2,"title"=>"【日報】20140530",       "body"=>"今日は寒かった。毛布ほしい", "content_date"=>'2014-05-30', "comment_num"=>3),
                        array("content_id"=>3,"title"=>"【日報】20140531",       "body"=>"今日は適当な日だった"      , "content_date"=>'2014-05-31', "comment_num"=>10)
                    );
    $profInfo = array("id"=>1,"name"=>"百田", "mail"=>"momota@momoclo.com", "group_name"=>"11期");

     //パス指定
//  $path="testPOSTview.php";
    $path="MainController.php";
  
    $headPath="../css/";
//    $headPath="view/css/"; 

    //代入
    $userInfo = $session;
//    $profInfo=
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>個人ページ</title>
        <link href="<?php echo $headPath; ?>group_view.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $headPath; ?>menu.css" rel="stylesheet" type="text/css">
        
        <!-- リンクをクリックした時のPOST送信動作-->
        <script type="text/javascript">
            function bodyClick(content_id){
                document.getElementById("content_id_input").value = content_id;
                document.bodyForm.submit();
                
            }
            
            function commentClick(content_id){
                document.getElementById("comment_input1").value = content_id;
                document.commentForm.submit();
                
            }
            
            function userClick(user_id){
                document.getElementById("user_input").value= user_id;
                document.userForm.submit();
                
            
            }
        </script>
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
 

                <li><a href=""><font id="info"><?php echo $userInfo["user_name"]?><br><?php echo $userInfo["group_name"]?></font></a>
 
                </li>
            </ul>
        </div>
        <br>
        
            
        <div class="body_part">
            <h2><?php echo $profInfo["name"]?>さんのページです</h2>
            <!-- プロフィール表示部-->
            <div class="body_left">
                <h2>プロフィール</h2><br>
                <table>
                    <tr><td>名前</td></tr>
                    <tr><td><?php echo $profInfo["name"];?></td></tr>
                    <tr><td>メールアドレス</td></tr>
                    <tr><td><?php echo $profInfo["mail"];?></td></tr>
                    <tr><td>所属グループ</td></tr>
                    <tr><td><?php echo $profInfo["group_name"];?></td></tr>
                </table>
            
            </div>
    
            <!-- 日報一覧表示部-->
            <div class="body_right">
            <table border="2">
                <tr>
                    <th>タイトル</th><th>コメント数</th><th>投稿日</th><th>削除・編集</th>
                </tr>
                <tr>
                    <th colspan="4">本文</th>
                </tr>
                
                <!-- POST送信のFORM-->
                <form name="bodyForm" method="POST" action="<?php echo $path; ?>?mode=report_show">
                    <input id="content_id_input" type="hidden" name="content_id" value="0">
                </form>
                
                <form name="commentForm" method="POST" action="<?php echo $path; ?>?mode=report_show">
                    <input id="comment_input1" type="hidden" name="content_id" value="0">
                    <input id="comment_input2" type="hidden" name="comment" value="1">
                </form>
                
                <form name="userForm" method="POST" action="<?php echo $path; ?>?mode=individual_reports">
                    <input id="user_input" type="hidden" name="user_id" value="0">
                </form>
                
                <?php
                    foreach($reports as $temp)
                    {
                        echo "<tr>";
                        echo "<td><a href=\"\" onclick=\"bodyClick(".$temp["content_id"]."); return false;\">".$temp["title"]."</a></td>";
                        echo "<td><a href=\"\" onclick=\"commentClick(".$temp["content_id"]."); return false;\">コメント(".$temp["comment_num"].")</a></td>";
                        echo "<td>".$temp["content_date"]."</td>";
                        echo "<td><form action=\"".$path."\" method=\POST\" name=\"delete\"><input type=\"checkbox\" value=\"".$temp["content_id"]."\"></form>";
                        echo "<form action=\"".$path."\" method=\"POST\" ><input type=\"hidden\" name=\"content_id\" value=\"".$temp["comment_num"]."\"><input type=\"submit\" value=\"削除\"></form>";                        
                        echo "<form action=\"".$path."?mode=report_edit\" method=\"POST\" ><input type=\"hidden\" name=\"content_id\" value=\"".$temp["comment_num"]."\"><input type=\"submit\" value=\"編集\"></form></td>";                        
                        echo "<tr><td colspan=\"5\"><a href=\"\" onclick=\"bodyClick(".$temp["content_id"]."); return false;\">".$temp["body"]."</a></td></tr>";
                    }
                ?>
                
                
            </table>
            
            </div>
        </div>
<a href="aaa.php">test</a>
</body>

</html>