<?php
require_once('../dao/UserDao.php')

private $loginObj = new UserDao();
private $post;
private $mode;

class LoginAction implements ActionInterface {
    
    public __construct($post) {
        $this->post = $post;
        $this->mode = $post['mode'];
    }
    
    /** 
     * @Override
     */
    public saveAction() {
        if ($mode == 'signup_complete') {
            $this->post["users_stat"] = 1;
            $this->loginObj->insert($this->post);
        }
    }
    
    /** 
     * @Override
     */
    public showAction() {
        $BEANS = $this->loginObj->select($this->post);
        swicth($mode) {
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