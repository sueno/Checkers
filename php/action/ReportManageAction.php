<?php
require_once 'dao/ContentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class ReportManageAction extends ActionSuper implements ActionInterface {

    private $contentDaoObj;
    private $post;

    public function __construct($post) {
    	parent::__construct($post);
    	$this->post = $post;
    	$this->contentDaoObj = new ContentDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
        $this->contentDaoObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	// debug
    	$this->post['contents_user_id'] = 3;
//     	$this->post['contents_title'] = "title edit title";
    	$this->post['contents_body'] = "contents edit contents";
    	$this->post['contents_date'] = "2014-06-03";
    	$this->post['contents_kind'] = 0;
		
    	// 日報新規投稿か、日報更新かの分岐
    	if (array_key_exists('contents_title', $this->post)) {
    		$this->contentDaoObj->insert($this->post);
    	}
    	else {
    		$this->post['contents_id'] = 4;
    		echo "<br><br><br>";
    		print_r($this->post);
    		echo "<br><br><br>";
    		
    		$this->contentDaoObj->update($this->post);
    	}
    	// todo 日報ページを表示させる
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    	// debug
//     	$this->post['contents_id'] = 4;
//     	echo '<br>va_dump post<br /><br />';
//     	var_dump($this->post);
    	if ($this->post['contents_id'] != null) {
//     		echo "<br>aaaaaaaaaaaaaaaaa<br>";
    		$BEANS['content'] = $this->contentDaoObj->select ( $this->post ,"*","where id = {$this->post['contents_id']}");
    	}
    	else {
    		$BEANS['title'] = '';
    		$BEANS['body'] = '';
    	}
//     	echo '<br>va_dump BEANS<br /><br />';
//     	var_dump($BEANS);
//     	echo '<br>echo<br /><br />';
//     	echo json_encode($BEANS);
    	print_r($BEANS['content']);
    	require_once ('view/php/report_edit_view.php');
    }
       
}

?>