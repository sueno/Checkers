<h1>日報編集ページ</h1>
<?php $report=$BEANS['contents'][0]; ?>
<table class="table table-bordered table-striped">
	<form method="POST" action="<?php echo $path; ?>?mode=report_manage">
		<tr>
			<td>タイトル：</td>
			<td><input type="text" name="contents_title"
				value="<?php echo $report["title"]; ?>" size="50"></td>
			<td>作成日:</td>
			<td><input type="text" name="contents_content_date"
				value="<?php echo $report["content_date"]; ?>" size="50"></td>
		</tr>

		<tr>
			<td colspan="4"><textarea name="contents_body" rows="30" cols="100"
					placeholder="本文をここに入力"><?php echo $report["body"]; ?></textarea></td>
		</tr>

</table>
<INPUT TYPE="HIDDEN" NAME="contents_id"
	VALUE="<?php ECHO $report["contents_id"];?>">
<input type="submit" value="投稿する">
</form>