<?php
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

require_once 'dao/ReportDao.php';
require_once 'dao/MemberDao.php';

class ReportListAction extends ActionSuper implements ActionInterface {

    
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
    	$this->reportObj = new ReportDao();
    	$this->reportObj->connect();
    	
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
        $post = array("groups_id"=>2,"stat"=>2);
        $BEANS["member"] = $this->memberObj->select($post);
        $post2 = array("groups_id"=>2,"stat"=>1);
        $BEANS["candidate"] = $this->memberObj->select($post2);
        
        print_r($BEANS);
        
        require_once('view/php/group_view.php');
    }
}

?>