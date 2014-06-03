
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
                	$reports = $BEANS["reports"];
					foreach ( $reports as $temp ) {
						echo "<tr>";
						echo "<td><a href=\"" . $path . "?mode=report_show&content_id=" . $temp ["content_id"] . "\">" . $temp ["title"] . "</a></td>";
// 						echo "<td><a href=\"" . $path . "?mode=report_show&content_id=" . $temp ["content_id"] . "\">" . "コメント(" . $temp ["comment_num"] . ")</a></td>";
						echo "<td>" . $temp ["content_date"] . "</td>";
						echo "<td><a href=\"" . $path . "?mode=individual_reports&user_id=" . $temp ["user_id"] . "\">" . $temp ["user_name"] . "</a></td>";
						echo "<tr><td colspan=\"4\"><a href=\"" . $path . "?mode=report_show&content_id=" . $temp ["content_id"] . "\">" . $temp ["body"] . "</a></td></tr>";
					}
				?>

            </table>

</div>