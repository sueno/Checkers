<?php
require_once 'dao/GroupDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LoginAction extends ActionSuper implements ActionInterface {

    private $loginObj;

    public function __construct($post) {
    	parent::__construct($post);
    }
    
    /**
     * @Override
     */
    public function initAction () {
//     	parent::initAction();
        $this->loginObj = new GroupDao();
        $this->loginObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
        if ($mode == 'signup_complete') {
            $this->post["users_stat"] = 1;
            $this->loginObj->insert($this->post);
        }
    }
    
    /** 
     * @Override
     */
    public function showAction() {
        $BEANS["groups"] = $this->loginObj->select($this->post);
//         switch($mode) {
//             case 'visitor':
                require 'view/php/login_top_view.php';
//                 break;
//             case 'signup_confirm':
//                 $data = array('users_id' => $post['users_id'], 'users_mail' => $post['users_mail'], 'users_password' => $post['users_password'], 'groups_id' => $post['groups_id']);
//                 require_once('../view/login_confirm_view.php');
//                 break;
//             case 'signup_complete':
//                 require_once('../view/login_complete_view.php');
//                 break;
//         }
    }
       
}

?>