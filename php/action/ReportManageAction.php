<?php
require_once 'dao/ContentDao.php';
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class ReportManageAction extends ActionSuper implements ActionInterface {

    private $contentDaoObj;

    public function __construct($post, $get) {
    	parent::__construct($post, $get);
    	$this->contentDaoObj = new ContentDao();
    }
    
    /**
     * @Override
     */
    public function initAction () {
    	parent::initAction();
        $this->contentDaoObj->connect();
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
    	// debug
//     	$this->post['contents_id'] = 4;
//     	echo '<br>va_dump post<br /><br />';
//     	var_dump($this->post);
    	if ($this->post['contents_id'] != null) {
//     		echo "<br>aaaaaaaaaaaaaaaaa<br>";
    		$BEANS['content'] = $this->contentDaoObj->select ( $this->post ,"*","where id = {$this->post['contents_id']}");
    	}
    	else {
    		$BEANS['title'] = '';
    		$BEANS['body'] = '';
    	}
//     	echo '<br>va_dump BEANS<br /><br />';
//     	var_dump($BEANS);
//     	echo '<br>echo<br /><br />';
//     	echo json_encode($BEANS);
//     	print_r($BEANS['content']);
    	require_once ('view/php/report_edit_view.php');
    }
       
}

?>