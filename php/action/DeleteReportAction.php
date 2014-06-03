<?php
require_once 'dao/ContentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class DeleteReportAction extends ActionSuper implements ActionInterface {

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
//     	echo '<br><br>dump<br><br>';
//     	var_dump($this->post);
    	$this->post['contents_delete_flg'] = true;
    	// debug	
//     	$this->post['contents_id'] = 4;
//     	var_dump($this->post);
//     	$this->post['contents_title'] = "title edit title";
//     	$this->post['contents_body'] = "test edit contents";
//     	$this->post['contents_content_date'] = "2014-06-03";
//     	$this->post['contents_kind'] = 0;
		
    	$this->contentDaoObj->update($this->post);

    	// 個人日報一覧ページを表示させる
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