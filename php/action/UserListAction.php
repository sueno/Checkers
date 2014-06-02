<?php
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

require_once 'dao/ReportDao.php';
require_once 'dao/UserDao.php';

class UserListAction extends ActionSuper implements ActionInterface {
    
    private $post;
   	private $reportObj;
   	private $userObj;

    public function __construct($post) {
        $this->post = $post;
    	$this->reportObj = new ReportDao();
    	$this->userObj = new UserDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
    	$this->reportObj->connect();
    	$this->userObj->connect();
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
        $post = array("users_name"=>"");
        $BEANS["users"] = $this->userObj->select($post,"*","where name = '{$post["users_name"]}'");
        
        print_r($BEANS);
        
        require_once 'view/php/individual_view.php';
    }
    

	
}


?>