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
    
<<<<<<< HEAD
    /**
=======
    /** 
>>>>>>> c18b4783fc84a3414fe6588f6e07e55c1299dbec
     * @Override
     */
    public initAction() {
        
    }
    
    /** 
     * @Override
     */
    public saveAction() {
        
    }
    
    /** 
     * @Override
     */
    public showAction() {
        
    }
    
    /** 
     * @Override
     */
    public errorAction(Exception e) {
        throw new Exception('error');
    }
       
}

?>