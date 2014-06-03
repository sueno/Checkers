<?php
require_once 'dao/ContentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class ReportManageAction extends ActionSuper implements ActionInterface {

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
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    	print_r($this->post);
    	if (array_key_exists('content_id', $this->post) && !empty($this->post['content_id'])) {
    		$BEANS['contents'] = $this->contentDaoObj->select ( $this->post ,"*","where id = {$this->post['content_id']}");
    	}
    	else {
    		$BEANS['contents'] = array(array("title"=>"","body"=>"","content_date"=>date('Y-m-d')));
    	}
    	require_once ('view/php/report_edit_view.php');
    }
       
}

?>