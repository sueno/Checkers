<?php
require_once('../dao/DaoSuper.php');

class ActionSuper implements ActionInterface {
 
    $daoSuperObj = new DaoSuper();

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
    public function errorAction(Exception e) {
        echo e->getMessage();
    }
}


?>