<?php $DEBUG = 1; 

        //テスト用配列　

    $reports = array(   array("content_id"=>1,"title"=>"【日報】20140529", "user_id"=>1,"user_name"=>"百田",    "body"=>"今日は暑かった。日傘ほしい", "date"=>'2014-05-29', "comment_num"=>5),
                        array("content_id"=>2,"title"=>"【日報】20140530", "user_id"=>2,"user_name"=>"玉井",    "body"=>"今日は寒かった。毛布ほしい", "date"=>'2014-05-30', "comment_num"=>3),
                        array("content_id"=>3,"title"=>"【日報】20140530", "user_id"=>3,"user_name"=>"佐々木",  "body"=>"今日は適当な日だった"      , "date"=>'2014-05-30', "comment_num"=>10)
                    );
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>グループページ</title>
        <link href="../css/group_view.css" rel="stylesheet" type="text/css">

    </head>


    <body>

        <div id="menu">
            <ul>
                <li><a href="" onclick="document.form1.submit();" >個人ページ</a>
                    <form name="form1" method="POST" action="../../MainController.php">
                        <input type=hidden name="mode" value="individual_reports">
                    </form>
                </li>


                <li><a href="" onclick="document.form2.submit();">グループページ</a>
                    <form name="form2" method="POST" action="../../MainController.php">
                        <input type=hidden name="mode" value="group_reports">
                    </form>
                </li>


                <li><a href="" onclick="document.form3.submit();">日報投稿</a>
                       <form name="form3" method="POST" action="../../MainController.php">
                            <input type=hidden name="mode" value="report_edit">
                        </form>
                </li>
 

                <li><a href="" >ログイン情報</a>
                </li>
            </ul>
        </div>
        <br>

        <div class="body_part">
            <div class="body_left">
            </div>
    
            <div class="body_right">
            <table border="2">
                <tr>
                    <th>タイトル</th><th>コメント数</th><th>投稿日</th><th>作成者</th>
                </tr>
                <tr>
                    <th colspan="4">本文</th>
                </tr>
                <?php
                    foreach($reports as $temp)
                    {
                        echo "<tr>";
                        echo "<td>".$temp["title"]."</td>";
                        echo "<td>".$temp["comment_num"]."</td>";
                        echo "<td>".$temp["date"]."</td>";
                        echo "<td>".$temp["user_name"]."</td></tr>";
                        echo "<tr><td colspan=\"4\">".$temp["body"]."</td></tr>";
                    }
                ?>
                
                
            </table>
            
            </div>
        </div>

</body>

</html>