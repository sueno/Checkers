<?php
require_once 'dao/GroupDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LoginConfirmAction extends ActionSuper implements ActionInterface {

    private $loginObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->loginObj = new GroupDao();
    	//debub
//     	echo 'post <br />';
//     	var_dump($this->post);
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
        $this->loginObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
//         if ($mode == 'signup_complete') {
//             $this->post["users_stat"] = 1;
//             $this->loginObj->insert($this->post);
//         }
    }
    
    /** 
     * @Override
     */
    public function showAction() {
        $BEANS["groups"] = $this->loginObj->select($this->post);
        $data = array('users_name' => $this->post['users_name'], 'users_mail' => $this->post['users_mail'], 'users_password' => $this->post['users_password'], 'groups_id' => $this->post['groups_id']);
        require_once('view/php/login_confirm_view.php');
    }
       
}

?>