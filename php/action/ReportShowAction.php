<?php
require_once 'dao/ContentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class ReportShowAction extends ActionSuper implements ActionInterface {

    private $contentDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post);
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
		$BEANS = json_encode($BEANS);
		require_once ('view/php/report_show.php');
    }
       
}

?>