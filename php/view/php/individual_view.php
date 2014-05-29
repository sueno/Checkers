<?php $DEBUG = 1; 

        //テスト用配列　

    $BEANS = array("groups"=>  array(array("id"=>1,"name"=>"11期"),array("id"=>2,"name"=>"12期"),array("id"=>3,"name"=>"13期")));
    
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
            </div>
        </div>

</body>

</html>