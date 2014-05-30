<?php

class UserList implements ActionInterface {
    public function __construct() {
        
        try {
            $this->initAction();
            $this->saveAction();
            $this->showAction();
        }
        catch(Exception $e) {
            $this->initAction();
        }
    }
    
    /** 
     * @Override
     */
    public function initAction() {
        
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
        
    }
    
    /** 
     * @Override
     */
    public function errorAction(Exception $e) {
        throw new Exception('error');
    }
}


?>