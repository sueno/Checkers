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
        <?php 
    		require 'view/contents/headContents.php';
    	?>
        <script type="text/javascript">
			$(function() {
				$("#navi_group_view").naviActive();
			});
        </script>
        
        <title>グループページ</title>
    </head>


    <body>

    <?php 
    	$headerHTML = 'view/contents/header.php';
    	$sidebarHTML = 'view/contents/groupUserList.php';
    	$bodyHTML = 'view/contents/reportList.php';
    	
    	require 'view/layout/sideMenuLayout.php';
    ?>
    
</body>

</html>