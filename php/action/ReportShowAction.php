<?php
require_once 'dao/ContentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class ReportShowAction extends ActionSuper implements ActionInterface {

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
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    	//debug
    	$this->post['content_id'] = 1;
		$BEANS ["content"] = $this->contentDaoObj->select($this->post,"title, body","where id = {$this->post['content_id']}");
		require_once ('view/php/report_show.php');
    }
       
}

?>