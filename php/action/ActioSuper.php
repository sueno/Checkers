<?php
require_once('../dao/DaoSuper.php');

class ActionSuper implements ActionInterface {
	
	public function __construct() {
    	$daoSuperObj = new DaoSuper();
	}

    /** 
     * @Override
     */
    public function initAction() {
        $this->daoSuperObj->connect();
        session_start();
    }
    
    /** 
     * @Override
     */
    public function errorAction($e) {
        echo $e->getMessage();
    }
}


?>