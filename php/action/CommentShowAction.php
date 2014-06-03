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
    	parent::initAction();
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
    	//debug
//     	$this->post['comments_contents_id'] = 1;
    	
		$BEANS["comment"] = $this->commentDaoObj->select($this->post);
		echo json_encode($BEANS);
// 		echo $BEANS;
// 		return $BEANS;
    }
    
}

?>
