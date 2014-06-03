<?php
require_once 'dao/ReportDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class ReportShowAction extends ActionSuper implements ActionInterface {

    private $contentDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post,$get);
    	$this->contentDaoObj = new ReportDao();
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
    	//debug
    	$this->post['content_id'] = 1;
		$BEANS ["content"] = $this->contentDaoObj->select($this->post,"","contents.id = {$this->post['content_id']}");
		var_dump($BEANS);
// 		$BEANS = json_encode($BEANS);
		require_once ('view/php/report_show_view.php');
    }
       
}

?>