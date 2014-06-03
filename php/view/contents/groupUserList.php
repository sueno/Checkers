
            <!-- グループメンバ表示部-->
            <div>
                <h2>メンバー</h2><br>
                <ul>
                    <?php
                        foreach($memberList as $temp)
                         echo "<li><a href=\"".$path."?mode=individual_reports&user_id=".$temp["member_id"]."\">".$temp["member_name"]."</a></li>";

                    ?>
                </ul>
                
                 <h2>承認待ちユーザー</h2><br>

                <ul>
                    <?php
                        foreach($candidateList as $temp)
                        { ?>
                        	<form name="groupRecog<?php echo $temp["member_id"]; ?>" method="POST" action="<?php echo $path; ?>?mode=group_recog">
                        		<input type="hidden" name="users_id" value="<?php echo $temp["member_id"]; ?>">
                        	</form>
                        <?php 
                         echo "<li>".$temp["member_name"]."　　　　"."<a href='' onclick='document.groupRecog".$temp["member_id"].".submit(); return false; '>承認</a></li>";
                        }
                    ?>
                </ul>               
                
            </div>