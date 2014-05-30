<?php
require_once('dao/DaoSuper.php');
require_once 'ActionInterface.php';

abstract class ActionSuper implements ActionInterface {

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