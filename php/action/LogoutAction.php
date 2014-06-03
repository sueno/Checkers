<?php
require_once 'action/ActionSuper.php';
require_once 'action/ActionInterface.php';

class LogoutAction extends ActionSuper implements ActionInterface {
    
    public function __construct($post, $get) {
    	// セッション変数を全て解除する
    	$_SESSION = array();
    	// セッションを切断するにはセッションクッキーも削除する。
    	// Note: セッション情報だけでなくセッションを破壊する。
    	if (isset($_COOKIE[session_name()])) {
    		setcookie(session_name(), '', time()-42000, '/');
    	}
    	// 最終的に、セッションを破壊する
    	session_destroy();
    	
    	header("Location: MainController.php");
    	exit();
    }
    
    /**
     * @Override
     */
    public function initAction () {
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
    
}

?>