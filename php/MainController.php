<?php
require_once 'dao/UserDao.php';

$generateMainObj = new MainController();

class MainController {

    private $post = array();
    private $actionObj;
    private $mode;
    
    public function __construct() {
    	

    	//todo 各オブジェクトに直接渡す
    	$this->post = $_POST;
    	// debug
    	
    	
        if (isset($_GET['mode'])) {
            $this->mode = htmlspecialchars($_GET['mode']);
        }
        else {
            $this->mode = "visitor";
        }
        $this->actionObj = $this->getAction($this->mode);
//         echo 'this action obj <br />';
//         var_dump($this->actionObj);
        $this->init();
    }

    public function init() {
        try {
            $this->actionObj->initAction();
            $this->actionObj->saveAction();
            $this->actionObj->showAction();
        }
        catch(Exception $e){
        	echo 'error aaa<br />';
            $this->actionObj->errorAction($e);
        }
    }
    
    public function getAction($mode) {

//         echo "aaaa <br />";
//         echo $mode;

        switch($mode) {
            case 'visitor':
            	require_once 'action/LoginAction.php';
            	return new LoginAction($this->post);
            	break;
            case 'signup_confirm':
            	require_once 'action/LoginConfirmAction.php';
            	return new LoginConfirmAction($this->post);
            	break;
            case 'signup_complete':
                require_once 'action/LoginCompleteAction.php';
                return new LoginCompleteAction($this->post);
                break;
            case 'group_reports':
                require_once 'action/ReportListAction.php';
                return new ReportListAction($this->post); 
                break;
            case 'individual_reports':
                require_once 'action/UserListAction.php';
                return new UserListAction($this->post);
                break;
            case 'report_show':
                require_once 'action/ReportShow.php';
                return new ReportShow($this->post);
                break;
            case 'comment_show':
               	require_once 'action/CommentShow.php';
               	return new CommentShow($this->post);
               	break;
            case 'report_edit':
                require_once 'action/UserList.php';
                return new UserList($this->post);
                break;
        }
    }
}

?>