<?php
require_once('../dao/UserDao.php');
require_once('ActionInterface.php');

class LoginAction implements ActionInterface {

    private $loginObj;
    private $post;
    private $mode;
    
    public function __construct($post) {
        $this->$loginObj = new UserDao();
        $this->post = $post;
        $this->mode = $post['mode'];
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
        $BEANS = $this->loginObj->select($this->post);
        switch($mode) {
            case 'visitor':
                require_once('../view/login_top_view.php');
                break;
            case 'signup_confirm':
                $data = array('users_id' => $post['users_id'], 'users_mail' => $post['users_mail'], 'users_password' => $post['users_password'], 'groups_id' => $post['groups_id']);
                require_once('../view/login_confirm_view.php');
                break;
            case 'signup_complete':
                require_once('../view/login_complete_view.php');
                break;
        }
    }
       
}

?>