<?php
require_once 'dao/ContentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class ReportManageSaveAction extends ActionSuper implements ActionInterface {

    private $contentDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->contentDaoObj = new ContentDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
        $this->contentDaoObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	// debug
    	$this->post['contents_user_id'] = 3;
//     	$this->post['contents_id'] = 4;
//     	$this->post['contents_title'] = "title edit title";
//     	$this->post['contents_body'] = "test edit contents";
//     	$this->post['contents_content_date'] = "2014-06-03";
//     	$this->post['contents_kind'] = 0;
		
    	// 日報新規投稿か、日報更新かの分岐
    	if (array_key_exists('contents_title', $this->post) && !empty($this->post['contents_title'])) {
    		//debug
//     		echo '<br / ><br / >aaaaaa<br / ><br / >';
    		$this->contentDaoObj->insert($this->post);
    	}
    	else {
//     		echo '<br / ><br / >bbbbbbb<br / ><br / >';
    		// debug
//     		$this->post['contents_id'] = 1;
//     		echo "<br><br><br>";
//     		print_r($this->post);
//     		echo "<br><br><br>";
    		
    		$this->contentDaoObj->update($this->post);
    	}
    	// todo 個人日報一覧ページを表示させる
    	header("Location: MainController.php?mode=individual_reports");
    	exit();
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    }
       
}

?>