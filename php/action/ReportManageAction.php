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
    	$this->post['content_id'] = 11;
    	$this->post['title'] = "title edit title";
    	$this->post['body'] = "contents edit contents";
    	if ($this->post['content_id'] == null) {
    		$this->contentDaoObj->insert($this->post);
    	}
    	else {
    		$this->contentDaoObj->update($this->post);
    	}
    	header('Location: ReportShowAction.php');
    	exit();
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    }
       
}

?>