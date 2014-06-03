
            <!-- グループメンバ表示部-->
            <div>
                <div class="list-group">
  					<a href="#" class="list-group-item list-group-item-info">メンバー</a>
                    <?php
                        foreach($memberList as $temp)
                         echo "<a class='list-group-item' href=\"".$path."?mode=individual_reports&user_id=".$temp["member_id"]."\">".$temp["member_name"]."</a>";

                    ?>
                </div>
                
                <div class="list-group">
  					<a href="#" class="list-group-item list-group-item-info">承認待ちユーザー</a>
                    <?php
                        foreach($candidateList as $temp)
                        { ?>
                        	<form name="groupRecog<?php echo $temp["member_id"]; ?>" method="POST" action="<?php echo $path; ?>?mode=group_recog">
                        		<input type="hidden" name="users_id" value="<?php echo $temp["member_id"]; ?>">
                        	</form>
                        <?php 
                         echo "<a class='list-group-item' href=\"".$path."?mode=individual_reports&user_id=".$temp["member_id"]."\">".$temp["member_name"]."　　　　"."<button onclick='document.groupRecog".$temp["member_id"].".submit(); return false; '>承認</button></a>";
                        }
                    ?>
                </div>               
                
            </div>