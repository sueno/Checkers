<?php
require_once 'dao/GroupDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LoginAction extends ActionSuper implements ActionInterface {

    private $loginObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	
//     	if ( !isset( $_SESSION["user_id"] ) || $_SESSION["user_id"]=="" ) {
//     		header("Location: MainController.php?mode=report_list");
//     		exit();
//         }
    	
    	$this->loginObj = new GroupDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::__construct();
        $this->loginObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    	if ( !array_key_exists('user_id', $_SESSION ) ) {
        	$BEANS["groups"] = $this->loginObj->select($this->post);
        	require 'view/php/login_top_view.php';
        } else {
    		header("Location: MainController.php?mode=group_reports");
    		exit();
        }
    }
       
}

?>