<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class ContentDao extends DaoSuper implements DaoInterface {

	private $tableName = "contents";
	
	public function connect () {
		parent::connect();
	}
	
	/**
	 * @Override
	 */
	public function insert ($post) {
		if ( parent::postExist($post, array("contents_user_id","contents_title","contents_body","contents_content_date","contents_kind")) ) {
			return parent::insertTable($this->tableName,"null,".$post["contents_user_id"].",'".$post["contents_title"]."','".$post["contents_body"]."','".$post["contents_content_date"]."',now(),false,'".$post["contents_kind"]."'");
		} else {
			return -1;
		}
	}
	
	/**
	 * @Override
	 */
	public function select ($post = null, $elem = "*", $conditions = "") {
		return parent::selectTable($this->tableName,$elem,$conditions);
	}
	
	/**
	 * @Override
	 */
	 public function update ($post) {
	     return parent::updateTable($this->tableName,$post);
	 }
}
?>