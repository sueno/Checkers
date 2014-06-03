<?php
require_once 'dao/CommentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class CommentAddAction extends ActionSuper implements ActionInterface {

    private $commentDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->commentDaoObj = new CommentDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
        $this->commentDaoObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	//debug
//     	$this->post['comments_contents_id'] = 1;
//     	$this->post['comments_poster'] = 3;
//     	$this->post['comments_body'] = "aaiaiaiia";
    	$this->commentDaoObj->insert($this->post);
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    }
    
}

?>
