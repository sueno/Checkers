
      <h1>日報編集ページ</h1>
      <?php $report=$BEANS['contents'][0];?>
      <form method="post" action="<?php echo $path; ?>?mode=report_manage_save">
        <table class="table table-bordered table-striped">      
          <tr>
            <td>タイトル：</td><td><input type="text" name="contents_title" value="<?php echo isset($report["title"]) ? $report["title"] : "" ; ?>" size="50" /></td>
            <td>作成日:</td><td><input type="text" name="contents_content_date" value="<?php echo isset($report["content_date"]) ? $report["content_date"] : ""; ?>" size="50" /></td>
          </tr>          
          <tr>
            <td colspan="4">
              <textarea name="contents_body" rows="30" cols="100" placeholder="本文をここに入力"><?php echo isset($report["body"]) ? $report["body"] : ""; ?></textarea>
            </td>
          </tr>
          <input type="hidden" name="contents_user_id" value="<?php echo $_SESSION["user_id"];?>" />
          <input type="hidden" name="contents_id" value="<?php echo isset($report["id"]) ? $report["id"] : "";?>" />
          <input type="submit" value="投稿する" />
        </table>
      </form>