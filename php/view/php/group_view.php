<?php $DEBUG = 1; 


 $reports = $BEANS["reports"];
 
//  var_dump($reports);
 $member = $BEANS["member"];
 $candidate = $BEANS["candidate"];
 
//  $candidate = array(array("member_id"=>1, "member_name"=>"takagi"),
//  					array("member_id"=>2, "member_name"=>"takagi"),
//  					array("member_id"=>3, "member_name"=>"takagi")
//  					);
    
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

    <?php 
    	$headerHTML = 'view/contents/header.php';
    	$sidebarHTML = 'view/contents/groupUserList.php';
    	$bodyHTML = 'view/contents/reportList.php';
    	
    	require 'view/layout/sideMenuLayout.php';
    ?>
            
<!--         <div class="body_part">
        <h2><?php //echo $userInfo["group_name"]?>さんのページです</h2>
<!--         </div> -->
    
</body>

</html>