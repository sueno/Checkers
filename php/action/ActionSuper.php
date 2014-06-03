<?php
require_once('dao/DaoSuper.php');
require_once 'ActionInterface.php';

abstract class ActionSuper implements ActionInterface {

	protected $post;

	public function __construct($post, $get) {
		$this->post = $post;
		// getにuser_id,content_idがある場合のみ、その値をpostに追加する。
		if (array_key_exists('user_id', $get) && !empty($get['user_id'])) {
			$this->post['user_id'] = $get['user_id'];
		}
		if (array_key_exists('content_id', $get) && !empty($get['content_id'])) {
			$this->post['content_id'] = $get['content_id'];
		}
	}
	
    /** 
     * @Override
     */
    public function initAction() {
        if ( !isset( $_SESSION["user_id"] ) || $_SESSION["user_id"]=="" ) {
        	throw new Exception('not session');
        }
    }
    

    abstract public function saveAction();
    abstract public function showAction();
    
    /** 
     * @Override
     */
    public function errorAction($e) {
    	var_dump($_SESSION);
        echo "<h1>".$e->getMessage()."</h1>";
        require_once 'action/LoginAction.php';
        $login = new LoginAction(null);
        $login->initAction();
        $login->showAction();
    }
    
}


?>