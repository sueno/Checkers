<?php
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

require_once 'dao/ReportDao.php';
require_once 'dao/UserDao.php';
require_once 'dao/GroupDao.php';

class UserListAction extends ActionSuper implements ActionInterface {
    
   	private $reportObj;
   	private $userObj;
   	private $groupObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
        echo "<h2>post</h2>";
    	var_dump($get);
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
        $userId = $this->post["user_id"];
        echo "<h2>user id </h2>";
        var_dump($this->post);
        $BEANS["reports"] = $this->reportObj->select(null,"","user_id = {$userId}");
        $BEANS["users"] = $this->userObj->select($post,"*","where id = {$userId}");
        $groupId = $BEANS["users"]["group_id"];
        $BEANS["groups"] = $this->groupObj->select(null,"groups_name","where id = {$groupId}");
        
        print_r($BEANS);
        
        require_once 'view/php/individual_view.php';
    }
    

	
}


?>