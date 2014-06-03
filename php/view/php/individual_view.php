<?php $DEBUG = 1; 

     //パス指定
//  $path="testPOSTview.php";
    $path="MainController.php";
  
//     $headPath="../css/";
   $headPath="view/css/"; 

    //代入
    $userInfo = $_SESSION;
     
    $reports = $BEANS["reports"];
    $profInfo = $BEANS["users"][0];
    $groupInfo = $BEANS["groups"][0];
    
//     var_dump($BEANS);
?>

<html>
    <head>
        <?php 
    		require 'view/contents/headContents.php';
    	?>
        <script type="text/javascript">
			$(function() {
				$("#navi_individual_view").naviActive();
			});
        </script>
        
        <title>個人ページ</title>
    </head>


    <body>
  
    <?php 
    	$headerHTML = 'view/contents/header.php';
    	$sidebarHTML = 'view/contents/userDetail.php';
    	$bodyHTML = 'view/contents/reportList.php';
    	
    	require 'view/layout/sideMenuLayout.php';
    ?>
        
      
</body>

</html>