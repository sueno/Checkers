<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class CommentDao extends DaoSuper implements DaoInterface {

	private $tableName = "contains";
	
	public function connect () {
		parent::connect();
	}
	
	/**
	 * @Override
	 */
	public function insert ($post) {
		if ( parent::postExist($post, array("comments_contents_id","comments_poster","comments_body","comments_date","comments_flag")) ) {
			return parent::insertTable($this->tableName,"null,'".$post["comments_contains_id"]."','".$post["comments_poster"]."','".$post["comments_body"]."','".$post["comments_date"]."','".$post["comments_flag"]."'");
		} else {
			return -1;
		}
	}
	
	/**
	 * @Override
	 */
	public function select ($data, $elem = "*", $conditions = "") {
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