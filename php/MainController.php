<?php

private $post;
private $mode;
$actionObj;

class MainContrller {
    
    public __construct() {
        $this->$post = htmlspecialchars($_POST);
        $this->$mode = $post["mode"];
        $actionObj = $this->getAction();
    }
    
    public getAction() {
        
        switch($mode) {
            case 'visitor':
            case 'signup_confirm':
            case 'signup_complete':
                require_once('action/LoginAction.php');
                return new LonginAction($post);
                break;
            case 'group_reports':
                require_once('action/ReportListAction.php');
                return new ReportListAction($post); 
                break;
            case 'individual_reports':
                require_once('action/ReportWrite.php');
                return new ReportWrite($post); 
                break;
            case 'report_show':
                require_once('action/CommentShow.php');
                return new CommentShow($post); 
                break;
            case 'group_reports':
                require_once('action/UserList.php');
                return new ReportListAction($post); 
                break;

        }
        
        
    }
    
}

?>