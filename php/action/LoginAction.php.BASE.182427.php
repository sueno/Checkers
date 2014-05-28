<?php

class LoginAction implements ActionInterface {

    public __construct() {
        
        try {
            $this->initAction();
            $this->saveAction();
            $this->showAction();
        }
        catch(Exception e) {
            $this->initAction();
        }
    }
    
    // @Override
    public initAction() {
        
    }
    
    // @Override
    public saveAction() {
        
    }
    
    // @Override
    public showAction() {
        
    }
    
    // @Override
    public errorAction() {
        
    }
       
}

?>