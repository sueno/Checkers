<?php
require_once('../dao/DaoSuper.php');
$daoSuperObj = new DaoSuper();

class ActionSuper implements ActionInterface {
 
    /** 
     * @Override
     */
    public initAction() {
        $this->daoSuperObj->connect();
    }
    
    /** 
     * @Override
     */
    public errorAction(Exception e) {
        echo e->getMessage();
    }
}


?>