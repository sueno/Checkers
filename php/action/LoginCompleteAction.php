<?php
require_once 'dao/UserDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LoginCompleteAction extends ActionSuper implements ActionInterface {

    private $loginObj;
    private $post;

    public function __construct($post) {
    	parent::__construct($post);
    	$this->post = $post;
    	$this->loginObj = new UserDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
        $this->loginObj = new UserDao();
        $this->loginObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
            $this->post["users_stat"] = 1;
//             echo 'post <br />';
//             var_dump($this->post);
            $this->loginObj->insert($this->post);
    }
    
    /** 
     * @Override
     */
    public function showAction() {
//         $BEANS["groups"] = $this->loginObj->select($this->post);
//         switch($mode) {
//             case 'visitor':
//                 require 'view/php/login_top_view.php';
//                 break;
//             case 'signup_confirm':
                $data = array('users_id' => $this->post['users_id'], 'users_mail' => $this->post['users_mail'], 'users_password' => $this->post['users_password'], 'groups_id' => $this->post['groups_id']);
//                 require_once('view/php/login_confirm_view.php');
//                 break;
//             case 'signup_complete':
                require_once('view/php/login_complete_view.php');
//                 break;
//         }
    }
       
}

?>