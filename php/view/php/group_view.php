<?php $DEBUG = 1; 

        //テスト用配列　本番はこれらの宣言をコメントアウト
    $session = array("user_name"=>"有安杏果","group_name"=>"１１期", "user_id"=>3,"group_id"=>1); 
    
//     $reports = array(   array("content_id"=>1,"title"=>"【日報】20140529", "user_id"=>1,"user_name"=>"百田",    "body"=>"今日は暑かった。日傘ほしい", "content_date"=>'2014-05-29', "comment_num"=>5),
//                         array("content_id"=>2,"title"=>"【日報】20140530", "user_id"=>2,"user_name"=>"玉井",    "body"=>"今日は寒かった。毛布ほしい", "content_date"=>'2014-05-30', "comment_num"=>3),
//                         array("content_id"=>3,"title"=>"【日報】20140530", "user_id"=>3,"user_name"=>"佐々木",  "body"=>"今日は適当な日だった"      , "content_date"=>'2014-05-30', "comment_num"=>10)
//                     );
//     $memberList = array(array("member_id"=>1,"member_name"=>"百田"), 
//                         array("member_id"=>2,"member_name"=>"玉井"),
//                         array("member_id"=>3,"member_name"=>"佐々木"),
//                         array("member_id"=>4,"member_name"=>"有安"),
//                         array("member_id"=>5,"member_name"=>"高城")
//                     );
                        
    $candidateList = array( array("member_id"=>1,"member_name"=>"前田"), 
                            array("member_id"=>2,"member_name"=>"指原"),
                            array("member_id"=>3,"member_name"=>"篠田"),
                            array("member_id"=>4,"member_name"=>"渡辺"),
                            array("member_id"=>5,"member_name"=>"高橋"));
 $reports = $BEAN["reports"];
 $memberList = $BEAN["member"];
    
     //パス指定
//  $path="testPOSTview.php";
    $path="MainController.php";
  
//    $headPath="../css/";
    $headPath="view/css/"; 

    //BEANSを代入
    $userInfo = $session;   //$_SESSION
    $memberList = $member;
    $candidateList = $candidate;
    
    
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>グループページ</title>
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
        <h2><?php echo $userInfo["group_name"]?>さんのページです</h2>
        
            <!-- グループメンバ表示部-->
            <div class="body_left">
                <h2>メンバー</h2><br>
                <ul>
                    <?php
                        foreach($memberList as $temp)
                         echo "<li><a href=\"\" onclick=\"userClick(".$temp["member_id"]."); return false;\">".$temp["member_name"]."</a></li>";

                    ?>
                </ul>
                
                 <h2>承認待ちユーザー</h2><br>
                <ul>
                    <?php
                        foreach($candidateList as $temp)
                         echo "<li>".$temp["member_name"]."　　　　"."<a href=\"\" onclick=\"userClick(".$temp["member_id"]."); return false;\">承認</a></li>";

                    ?>
                </ul>               
                
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
                        echo "<td><a href=\"\" onclick=\"userClick(".$temp["user_id"]."); return false;\">".$temp["user_name"]."</a></td>";
                        echo "<tr><td colspan=\"4\"><a href=\"\" onclick=\"bodyClick(".$temp["content_id"]."); return false;\">".$temp["body"]."</a></td></tr>";
                    }
                ?>
                
                
            </table>
            
            </div>
        </div>
<a href="aaa.php">test</a>
</body>

</html>