<?php
require_once('../dao/ContentDao.php');

class ReportAction implements ActionInterface {

    
    private $post;
   	private $reportObj;
   	private $memberObj;

    public function __construct($post) {
        $this->post = $post;
        $this->reportObj = new ReportDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
    	$this->loginObj = new GroupDao();
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