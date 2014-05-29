<?php

private $post;
private $mode;
private $actionObj;
private $controller = new MainController();
private $action = $controller->getAction();

try {
    $action->initAction();
    $action->saveAction();
    $action->showAction();
catch {
    $action->errorAction(Exception e);
}

class MainController {
    
    public __construct() {
        $this->$post = htmlspecialchars($_POST);
        $this->$mode = $post["mode"];
        $this->actionObj = $this->getAction();
    }
    
    public getAction() {
        
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