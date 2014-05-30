<?php $DEBUG = 1; 

        //テスト用配列　

    $reports = array(   array("content_id"=>1,"title"=>"【日報】20140529", "user_id"=>1,"user_name"=>"百田",    "body"=>"今日は暑かった。日傘ほしい", "date"=>'2014-05-29', "comment_num"=>5),
                        array("content_id"=>2,"title"=>"【日報】20140530", "user_id"=>2,"user_name"=>"玉井",    "body"=>"今日は寒かった。毛布ほしい", "date"=>'2014-05-30', "comment_num"=>3),
                        array("content_id"=>3,"title"=>"【日報】20140530", "user_id"=>3,"user_name"=>"佐々木",  "body"=>"今日は適当な日だった"      , "date"=>'2014-05-30', "comment_num"=>10)
                    );
    $memberList = array();
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>グループページ</title>
        <link href="../css/group_view.css" rel="stylesheet" type="text/css">
        
        <!-- リンクをクリックした時のPOST送信動作-->
        <script type="text/javascript">
            function bodyClick(content_id){
                document.bodyForm.mode="report_show";
                document.bodyForm.content_id = content_id;
                document.bodyForm.submit();
            }
            
            function commentClick(content_id){
                document.commentForm.mode="report_show";
                document.commentForm.content_id = content_id;
                document.commentForm.comment = 1;
                document.commentForm.submit();
            }
            
            function userClick(user_id){
                document.userForm.mode="individual_reports";
                document.userForm.user_id = user_id;
                document.userForm.submit();
            
            }
        </script>
    </head>


    <body>

        <div id="menu">
            <ul>
                <li><a href="" onclick="window.document.menuForm1.submit(); return false;" >個人ページ</a>
                    <form name="menuForm1" method="POST" action="testPOSTview.php">
                        <input type="hidden" name="mode" value="individual_reports">
                        
                    </form>
                </li>


                <li><a href="" onclick="document.menuForm.submit();return false;">グループページ</a>
                    <form name="menuForm2" method="POST" action="../../MainController.php">
                        <input type="hidden" name="mode" value="group_reports">
                    </form>
                </li>


                <li><a href="" onclick="document.menuForm.submit(); return false;">日報投稿</a>
                       <form name="menuForm3" method="POST" action="../../MainController.php">
                            <input type="hidden" name="mode" value="report_edit">
                        </form>
                </li>
 

                <li><a href="" >ログイン情報</a>
                </li>
            </ul>
        </div>
        <br>
        
            
        <div class="body_part">
        
        <!-- グループメンバ表示部-->
            <div class="body_left">
            
            </div>
    
            <!-- 日報一覧表示部-->
            <div class="body_right">
            <table border="2">
                <tr>
                    <th>タイトル</th><th>コメント数</th><th>投稿日</th><th>作成者</th>
                </tr>
                <tr>
                    <th colspan="4">本文</th>
                </tr>
                
                <!-- POST送信のFORM-->
                <form name="bodyForm" method="POST" action="../../MainController.php">
                        <input type="hidden" name="mode" value="report_show">
                </form>
                
                <form name="commentForm" method="POST" action="../../MainController.php">
                        <input type="hidden" name="mode" value="report_show">
                </form>
                
                <form name="userForm" method="POST" action="../../MainController.php">
                        <input type="hidden" name="mode" value="individual_reports">
                </form>
                
                <?php
                    foreach($reports as $temp)
                    {
                        echo "<tr>";
                        echo "<td><a href=\"\" onclick=\"bodyClick(".$temp["content_id"].")\">".$temp["title"]."</a></td>";
                        echo "<td><a href=\"\" onclick=\"commentClick(".$temp["content_id"].")\">".$temp["comment_num"]."</a></td>";
                        echo "<td>".$temp["date"]."</td>";
                        echo "<td><a href=\"\" onclick=\"userClick(".$temp["user_id"].")\">".$temp["user_name"]."</a></td>";
                        echo "<tr><td colspan=\"4\"><a href=\"\" onclick=\"bodyClick(".$temp["content_id"].")\">".$temp["body"]."</a></td></tr>";
                    }
                ?>
                
                
            </table>
            
            </div>
        </div>
<a href="aaa.php">test</a>
</body>

</html>