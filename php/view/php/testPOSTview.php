<html>
    <head>
        <meta charset="utf-8">
        <title>グループページ</title>

    </head>


    <body>

<?php

        <table>
        foreach($_POST as $key=>$value)
        {
            
             echo "<tr><td>".$key."</td><td>".$value."</td></tr>";

        }
        </table>
        
?>
    </body>
</html>