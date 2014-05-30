<?php
require_once('dao/UserDao.php');

$hoge = new MainController();

class MainController {

    private $post;
    private $actionObj;
    private $mode;

    public function __construct() {
        
        if (isset($_POST['mode'])) {
            $this->post = htmlspecialchars($_POST);
            $this->post['mode'] = $this->mode;
        }
        else {
            $this->mode = "visitor";
        }
        $this->actionObj = $this->getAction($this->mode);
        echo 'this action obj';
        var_dump($this->actionObj);
        $this->init();
    }

    public function init() {
        try {
            $this->actionObj->initAction();
            $this->actionObj->saveAction();
            $this->actionObj->showAction();
        }
        catch(Exception $e){
            $this->actionObj->errorAction($e);
        }
    }
    
    public function getAction($mode) {

        echo "aaaa <br />";
        echo $mode;

        switch($mode) {
            case 'visitor':
            	require_once('action/LoginAction.php');
            	return new LoginAction($this->post);
            	break;
            case 'signup_confirm':
            	require_once('action/LoginConfirmAction.php');
            	return new LoginConfirmAction($this->post);
            	break;
            case 'signup_complete':
                require_once('action/LoginCompleteAction.php');
                return new LoginCompleteAction($this->post);
                break;
            case 'group_reports':
                require_once('action/ReportListAction.php');
                return new ReportListAction($this->post); 
                break;
            case 'individual_reports':
                require_once('action/ReportWrite.php');
                return new ReportWrite($this->post);
                break;
            case 'report_show':
                require_once('action/CommentShow.php');
                return new CommentShow($this->post);
                break;
            case 'report_edit':
                require_once('action/UserList.php');
                return new UserList($this->post);
                break;
        }
    }
}

?>