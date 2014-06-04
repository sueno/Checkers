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
//         echo "<h2>post</h2>";
//     	var_dump($get);
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
        if ($userId==null) {
        	$userId = $_SESSION["user_id"];
        }
//         var_dump($this->post);
        $BEANS["users"] = $this->userObj->select($post,"*","where id = {$userId}");
        $groupId = $BEANS["users"][0]["group_id"];
        
        if ($groupId==$_SESSION["group_id"]) {
        	$BEANS["reports"] = $this->reportObj->select(null,"","where user_id = {$userId} and contents.delete_flg = 0 group by contents.id ");
        	$BEANS["groups"] = $this->groupObj->select(null,"name","where id = {$groupId}");
        } else {
        	$BEANS["reports"] = array(array());
        	$BEANS["groups"] = array(array("name"=>"非公開"));
        	$BEANS["users"] = array(array("name"=>"非公開","mail"=>"非公開"));
        }
        
        require_once 'view/php/individual_view.php';
    }
    

	
}


?>