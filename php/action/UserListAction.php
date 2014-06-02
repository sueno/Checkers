<?php
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

require_once 'dao/ReportDao.php';
require_once 'dao/UserDao.php';
require_once 'dao/GroupDao.php';

class UserListAction extends ActionSuper implements ActionInterface {
    
    private $post;
   	private $reportObj;
   	private $userObj;
   	private $groupObj;

    public function __construct($post) {
        $this->post = $post;
    	$this->reportObj = new ReportDao();
    	$this->userObj = new UserDao();
    	$this->groupObj = new GroupDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
    	$this->reportObj->connect();
    	$this->userObj->connect();
    	$this->groupObj->connect();
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
        $userName = $this->post["user_id"];
        $BEANS["users"] = $this->userObj->select($post,"*","where id = '{$userName}'");
        $groupId = $BEANS["users"]["group_id"];
        $BEANS["groups"] = 
        
        print_r($BEANS);
        
        require_once 'view/php/individual_view.php';
    }
    

	
}


?>