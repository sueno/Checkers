<html>
    <head>
        <meta charset="utf-8">
        <title>グループページ</title>

    </head>


    <body>
    
    <h1>GET送信情報一覧</h1>
<?php

        echo "<table border=1>";
        foreach($_GET as $key=>$value)
        {
            
             echo "<tr><td>".$key."</td><td>".$value."</td></tr>";

        }
        echo"</table>";
        
?>    
    <br>
    <h1>POST送信情報一覧</h1>
<?php

        echo "<table border=1>";
        foreach($_POST as $key=>$value)
        {
            
             echo "<tr><td>".$key."</td><td>".$value."</td></tr>";

        }
        echo"</table>";
        
?>
    </body>
</html>