<?php

class CommentShow implements ActionInterface {
    
    /** 
     * @Override
     */
    public function showAction() {
        $BEANS = $this->loginObj->select($this->post);
        return $BEANS;
    }
    
}


?>