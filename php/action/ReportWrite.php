<?php

class ReportWrite implements ActionInterface {
    public function __construct() {
        try {
            $this->initAction();
            $this->saveAction();
            $this->showAction();
        }
        catch(e) {
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
    public function errorAction(Exception e) {
        throw new Exception('error');
    }
}


?>