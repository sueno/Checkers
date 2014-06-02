<?php
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

require_once 'dao/ReportDao.php';
require_once 'dao/MemberDao.php';

class ReportAction extends ActionSuper implements ActionInterface {

    
    private $post;
   	private $reportObj;
   	private $memberObj;

    public function __construct($post) {
        $this->post = $post;
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
    	$this->loginObj = new ReportDao();
    	$this->loginObj->connect();
    	
    	$this->memberObj = new MemberDao();
    	$this->memberObj->connect();
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
    	$BEANS = array();
        $BEANS["reports"] = $this->reportObj->select();
        $BEANS["member"] = $this->reportObj->select($this->post);
        
        require_once('view/php/group_view.php');
    }
}

?>