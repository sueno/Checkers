<?php
require_once 'dao/UserDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class GroupRecogAction extends ActionSuper implements ActionInterface {

    private $userDaoObj;
    private $post;

    public function __construct($post) {
//     	parent::__construct($post);
    	$this->post = $post;
    	$this->userDaoObj = new UserDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
        $this->userDaoObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	//debug
    	$this->post['users_id'] = 4;
    	
    	$this->post["users_stat"] = 2;
    	$this->userDaoObj->update($this->post);
    	header('Location: ReportListAction.php');
    	exit();
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    }
       
}

?>