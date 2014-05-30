<?php
require_once('dao/DaoSuper.php');
require_once 'ActionInterface.php';

abstract class ActionSuper implements ActionInterface {

	private $post;

	public function __construct($post) {
		$this->post = $post;
	}
	
    /** 
     * @Override
     */
    public function initAction() {
        session_start();
    }
    

    abstract public function saveAction();
    abstract public function showAction();
    
    /** 
     * @Override
     */
    public function errorAction($e) {
        echo $e->getMessage();
    }
}


?>