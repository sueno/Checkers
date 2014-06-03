<?php
require_once 'dao/GroupDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LoginAction extends ActionSuper implements ActionInterface {

    private $loginObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->loginObj = new GroupDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
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
        $BEANS["groups"] = $this->loginObj->select($this->post);
        require 'view/php/login_top_view.php';
    }
       
}

?>