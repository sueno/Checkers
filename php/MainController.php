<?php
require_once 'dao/UserDao.php';

session_start();

$generateMainObj = new MainController();

class MainController {

    private $post = array();
    private $actionObj;
    private $mode;
    
    public function __construct() {
        if (isset($_GET['mode'])) {
            $this->mode = htmlspecialchars($_GET['mode']);
        }
        else {
            $this->mode = "visitor";
        }
        $this->actionObj = $this->getAction($this->mode);
        $this->init();
    }

    public function init() {
        try {
            $this->actionObj->initAction();
            $this->actionObj->saveAction();
            $this->actionObj->showAction();
        }
        catch(Exception $e){
        	echo '<br />error<br />';
            $this->actionObj->errorAction($e);
        }
    }
    
    public function getAction($mode) {
        switch($mode) {
            case 'visitor':
            	require_once 'action/LoginAction.php';
            	return new LoginAction($_POST, $_GET);
            	break;
            case 'signup_confirm':
            	require_once 'action/LoginConfirmAction.php';
            	return new LoginConfirmAction($_POST, $_GET);
            	break;
            case 'signup_complete':
                require_once 'action/LoginCompleteAction.php';
                return new LoginCompleteAction($_POST, $_GET);
                break;
            case 'group_reports':
                require_once 'action/ReportListAction.php';
                return new ReportListAction($_POST, $_GET); 
                break;
            case 'individual_reports':
                require_once 'action/UserListAction.php';
                return new UserListAction($_POST, $_GET);
                break;
            case 'report_show':
                require_once 'action/ReportShowAction.php';
                return new ReportShowAction($_POST, $_GET);
                break;
            case 'report_manage':
                require_once 'action/ReportManageAction.php';
                return new ReportManageAction($_POST, $_GET);
                break;
            case 'report_manage_save':
                require_once 'action/ReportManageSaveAction.php';
                return new ReportManageSaveAction($_POST, $_GET);
                break;            
            case 'comment_show':
               	require_once 'action/CommentShowAction.php';
               	return new CommentShowAction($_POST, $_GET);
               	break;
            case 'comment_add':
               	require_once 'action/CommentAddAction.php';
               	return new CommentAddAction($_POST, $_GET);
               	break;
            case 'group_recog':
               	require_once 'action/GroupRecogAction.php';
               	return new GroupRecogAction($_POST, $_GET);
               	break;
            case 'delete_report':
               	require_once 'action/DeleteReportAction.php';
               	return new DeleteReportAction($_POST, $_GET);
               	break;
            case 'logout':
               	require_once 'action/LogoutAction.php';
               	return new LogoutAction($_POST, $_GET);
               	break;
        }
    }
}

?>