<?php
require_once 'dao/UserDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class GroupRecogAction extends ActionSuper implements ActionInterface {

    private $userDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->userDaoObj = new UserDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
        $this->userDaoObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	//debug
//     	$this->post['users_id'] = 4;
    	
    	$this->post["users_stat"] = 2;
    	$this->userDaoObj->update($this->post);
    	header('Location: MainController.php?mode=group_reports');
    	exit();
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    		header("Location: MainController.php?mode=group_reports");
    		exit();
    }
       
}

?>