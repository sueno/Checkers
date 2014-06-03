<?php
require_once 'dao/UserDao.php';
require_once 'dao/GroupDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LoginCompleteAction extends ActionSuper implements ActionInterface {

    private $userDaoObj;
    private $groupDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->userDaoObj = new UserDao();
    	$this->groupDaoObj = new GroupDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
        $this->userDaoObj->connect();
        $this->groupDaoObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
        

        if ( isset( $this->post["users_name"] ) && $this->post["users_name"]!="" ) {
        	$userObj = new UserDao();
        	$userObj->connect();
        	$userData = $userObj->select(null,"id, group_id, password, stat","where name = '{$this->post["users_name"]}'");
        	$user = $userData[0];
        
        
        	if ($user!=null) {
        		throw new Exception("username is already taken");
        	}
        
        	$groupObj = new GroupDao();
        	$groupObj->connect();
        	$groupData = $groupObj->select(null,"name","where id = {$this->post['groups_id']}");
        	//     		echo "session    ok";
        	//     		echo "<br><br><h1>groupdata</h1><br><br>";
        	//     		var_dump($groupData);
        	$group = $groupData[0];
        
        	//     		echo "<br><br><h1>session insert</h1><br><br>";

        	$this->post["users_stat"] = 1;
        	$id = $this->userDaoObj->insert($this->post);
        	
        	if (0<$id) {
        		$_SESSION["user_id"] = $id;
        		$_SESSION["user_name"] = $this->post["users_name"];
    			$_SESSION["group_id"] = $this->post["groups_id"];
            	$_SESSION["group_name"] = $group["name"];
        	}            

        }
    }
    
    /** 
     * @Override
     */
    public function showAction() {
		$BEANS ["groups"] = $this->groupDaoObj->select ( $this->post );
		$data = array (
				'users_name' => $this->post ['users_name'],
				'users_mail' => $this->post ['users_mail'],
				'users_password' => $this->post ['users_password'],
				'groups_id' => $this->post ['groups_id'] 
		);
		require_once ('view/php/login_complete_view.php');
    }
       
}

?>