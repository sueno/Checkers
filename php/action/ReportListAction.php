<?php
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

require_once 'action/UserListAction.php';

require_once 'dao/UserDao.php';
require_once 'dao/GroupDao.php';
require_once 'dao/ReportDao.php';
require_once 'dao/MemberDao.php';

class ReportListAction extends ActionSuper implements ActionInterface {
    
   	private $reportObj;
   	private $memberObj;
   	
   	private $state;
   	private $userAct;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->reportObj = new ReportDao();
    	$this->memberObj = new MemberDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	session_start();
    	
    	$this->reportObj->connect();
    	$this->memberObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	
    	if ($this->getTableCalumnExistList($this->post, array("users_name","users_password"))!=null) {
    		$sessionVal = $this->getTableCalumnExistList($this->post, array("users_name","users_password"));
    		$userObj = new UserDao();
    		$userObj->connect();
    		$userData = $userObj->select(null,"id, group_id, password, stat","where name = '{$sessionVal["users_name"]}'");
    		$user = $userData[0];
    		
    		
    		if ($user["stat"]==2) {
    			$this->state = true;
    		} else {
    			$this->state = false;
    			$this->post["user_id"] = $user["id"];
    		}
    		
//     		echo "<br><br><h1>session create</h1><br><br>";		
//     		var_dump($user);
    		
    		if ( $sessionVal["users_password"] != $user["password"] ) {
        		throw new Exception('password miss match');
    		}
    		
    		$groupObj = new GroupDao();
    		$groupObj->connect();
    		$groupData = $groupObj->select(null,"name","where id = {$user['group_id']}");
//     		echo "session    ok";
//     		echo "<br><br><h1>groupdata</h1><br><br>";	
//     		var_dump($groupData);
    		$group = $groupData[0];

//     		echo "<br><br><h1>session insert</h1><br><br>";

    		$_SESSION["user_id"] = $user["id"];
    		$_SESSION["user_name"] = $sessionVal["users_name"];
    		$_SESSION["group_id"] = $user["group_id"];
    		$_SESSION["group_name"] = $group["name"];
    		
//     		var_dump($_SESSION);
//     		echo "<br><br><h1>session end</h1><br><br>";
    	} else if (array_key_exists('user_id', $_SESSION) && !empty($_SESSION['user_id'])) {
    	} else {
        	throw new Exception('login failed');
    	}
    }
    
    /** 
     * @Override
     */
    public function showAction() {
		if ($this->state) {
	    	$BEANS = array();
	    	$groupId = $_SESSION['group_id'];
	        $BEANS["reports"] = $this->reportObj->select(null,"","users.group_id = {$groupId}  and contents.delete_flg = false");
	        $post = array("groups_id"=>$groupId,"stat"=>2);
	        $BEANS["member"] = $this->memberObj->select($post);
	        $post2 = array("groups_id"=>$groupId,"stat"=>1);
	        $BEANS["candidate"] = $this->memberObj->select($post2);
       		require_once('view/php/group_view.php');
		} else {
        	$userAct = new UserListAction($this->post, array());
			$userAct->initAction();
			$userAct->saveAction();
			$userAct->showAction();
		}
    }
    


    private function getTableCalumnExistList ($post, $values) {
    	$list = array();
    	foreach($values as $val) {
    		if ( isset( $post[$val] ) && $post[$val]!="" ) {
    			$list[$val] = $post[$val];
    		} else {
    			return null;
    		}
    	}
    	return $list;
    }
}

?>