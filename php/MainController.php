<?php
require_once('dao/UserDao.php');

$hoge = new MainController();

class MainController {

    private $post;
    // private $mode;
    private $actionObj;

    public function __construct() {
        
        if (isset($_POST)) {
            $this->post = htmlspecialchars($_POST);
            // $this->mode = $_GET["mode"];
        }
        else {
            $this->mode = "visitor";
        }
        $this->actionObj = $this->getAction($_GET["mode"]);
        var_dump($this->actionObj);
        $this->init();
    }

    public function init() {
        try {
            $action->initAction();
            $action->saveAction();
            $action->showAction();
        }
        catch(Exception $e){
            $action->errorAction($e);
        }
    }
    
    public function getAction($mode) {

        echo "aaaa <br />";
        echo $mode;

        switch($mode) {
            case 'visitor':
            case 'signup_confirm':
            case 'signup_complete':
                require_once('action/LoginAction.php');
                return new LonginAction($this->post);
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