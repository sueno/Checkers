
<!-- 日報一覧表示部-->
<div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>タイトル</th>
<!-- 			<th>コメント数</th> -->
			<th>投稿日</th>
			<th>作成者</th>
		</tr>
		<tr>
			<th colspan="4">本文</th>
		</tr>
                
                <?php
                	$session = $_SESSION;
                	$reports = $BEANS["reports"];
                	
//                 	var_dump($reports);
                	
                    foreach($reports as $temp)
                    {
                        echo "<tr>";
                        echo "<td><a href=\"".$path."?mode=report_show&content_id=".$temp["content_id"]."\">".$temp["title"]."</a></td>";
//                         echo "<td><a href=\"".$path."?mode=report_show&content_id=".$temp["content_id"]."\">"."コメント(".$temp["comment_num"].")</a></td>";
                        echo "<td>".$temp["content_date"]."</td>";
                        if($session["user_id"]==$temp["user_id"]) {
                            echo "<td>".
                                   "<form action=\"".$path."?mode=delete_report\" method=\"POST\" >".
                                     "<input type=\"hidden\" name=\"contents_id\" value=\"".$temp["content_id"]."\">".
                                     "<input type='hidden' name='contents_title' value='".$temp["title"]."'>".
                                     "<input type='hidden' name='contents_body' value='".$temp["body"]."'>".
                                     "<input type='hidden' name='contents_content_date' value='".$temp["content_date"]."'>".
                                     "<input type=\"submit\" value=\"削除\">".
                                   "</form>";                        
                            echo "<form action=\"".$path."?mode=report_manage&content_id=".$temp["content_id"]."\" method=\"POST\" ><input type=\"submit\" value=\"編集\"></form></td></tr>"; 
                        } else {
                            echo "<td><a href='MainController.php?mode=individual_reports&user_id=".$temp["user_id"]."'>".$temp["user_name"]."</a></td></tr>";
                        }
                            echo "<tr><td colspan=\"5\"　height=\"70\"　><a href=\"".$path."?mode=report_show&content_id=".$temp["content_id"]."\" style=\"text-overflow:  ellipsis;\">".$temp["body"]."</a></td></tr>";
                    }
				?>

            </table>

</div>