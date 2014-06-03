<?php $DEBUG = 1; 


 $reports = $BEANS["reports"];
 $member = $BEANS["member"];
 $candidate = $BEANS["candidate"];
 
    
     //パス指定
    $path="MainController.php";
    $headPath="view/css/"; 

    //BEANSを代入
    $userInfo = $_SESSION;   //$_SESSION
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

    <?php require 'view/layout/header.php'; ?>
    
        <div id="menu">
            <ul>
                <li><a href="<?php echo $path; ?>?mode=individual_reports&user_id=<?php echo $userInfo["user_id"]; ?>" onclick="window.document.menuForm1.submit(); return false;" >個人ページ</a>
                    <form name="menuForm1" method="POST" action="<?php echo $path; ?>?mode=individual_reports&user_id=<?php echo $userInfo["user_id"]; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $userInfo["user_id"]; ?>">
                    </form>
                </li>


                <li><a href="" onclick="document.menuForm2.submit();return false;">グループページ</a>
                    <form name="menuForm2" method="POST" action="<?php echo $path; ?>?mode=group_reports">
                    </form>
                </li>


                <li><a href="" onclick="document.menuForm3.submit(); return false;">日報投稿</a>
                       <form name="menuForm3" method="POST" action="<?php echo $path; ?>?mode=report_manage">
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