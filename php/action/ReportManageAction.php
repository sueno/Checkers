<?php
require_once('../dao/ContentDao.php');

class ReportAction implements ActionInterface {
	private $post;
	private $mode;
	
    public function __construct($post) {
        $this->post = $post;
        $this->mode = $post['mode'];
        $reportObj = new ContentDao();
    }
    
    /** 
     * @Override
     */
    public function saveAction() {
    	$this->reportObj->insert($this->post);
    }
    
    /** 
     * @Override
     */
    public function showAction() {
        $BEANS = $this->reportObj->select($this->post);
        switch($mode) {
            case 'group_reports':
                require_once('../view/group_view.php.php');
                break;
            case 'individual_reports':
                require_once('../view/ndividual_view.php');
                break;
        }
    }
       
}

?>