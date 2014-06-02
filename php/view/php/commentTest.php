<?php

    $comments = array(  array("user_name"=>"武士", "content"=>"いいね。見習いたい", "user_id"=>5, "date"=>'2014-05-29'), 
                        array("user_name"=>"モノノフ", "content"=>"あーりんわっしょい","user_id"=>6, "date"=>'2014-05-29'), 
                        array("user_name"=>"ぼへみあ", "content"=>"こんにちは。","user_id"=>7, "date"=>'2014-05-29'),
                    );
    echo json_encode($comments);

    
?>