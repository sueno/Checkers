<?php

interface ActionInterface {

    public function initAction();
    public function saveAction();
    public function showAction();
    public function errorAction($e);
    
}

?>
