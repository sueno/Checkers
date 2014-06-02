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
    	$sessionVal = $this->getTableCalumnExistList($this->post, array("users_name","users_password"));
    	if ($sessionVal!=null) {
    		$_SESSION["user_id"] = 1;
    		$_SESSION["user_name"] = $sessionVal["users_name"];
    		$_SESSION["group_id"] = 2;
    		$_SESSION["group_name"] = "dummyGroup";
    	} else {
        	throw new Exception('login failed');
    	}
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
        
        require_once('view/php/group_view.php');
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