<?php
require_once 'dao/UserDao.php';
require_once 'dao/GroupDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LoginCompleteAction extends ActionSuper implements ActionInterface {

    private $userDaoObj;
    private $groupDaoObj;
    private $post;

    public function __construct($post) {
    	parent::__construct($post);
    	$this->post = $post;
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
            $this->post["users_stat"] = 1;
            echo 'post <br />';
            var_dump($this->post);
            $this->userDaoObj->insert($this->post);
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