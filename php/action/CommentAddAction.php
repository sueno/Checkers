<?php
require_once 'dao/CommentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class CommentAddAction extends ActionSuper implements ActionInterface {

    private $commentDaoObj;
    private $post;

    public function __construct($post) {
    	parent::__construct($post);
    	$this->post = $post;
    	$this->commentDaoObj = new CommentDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
        $this->commentDaoObj->connect();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	//debug
//     	$this->post['comments_contents_id'] = 1;
//     	$this->post['comments_poster'] = 3;
//     	$this->post['comments_body'] = "hogebodyhoge";
    	$this->commentDaoObj->insert($this->post);
    }
    
    /** 
     * @Override
     */
    public function showAction() {
    }
    
}

?>
