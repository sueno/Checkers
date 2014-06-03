<?php
require_once 'dao/CommentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class CommentShowAction extends ActionSuper implements ActionInterface {

    private $commentDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
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
    }
    
    /** 
     * @Override
     */
    public function showAction() {
		$BEANS["comment"] = $this->commentDaoObj->select($this->post);
		echo json_encode($BEANS);
		return $BEANS;
    }
    
}

?>
