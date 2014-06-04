<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class CommentDao extends DaoSuper implements DaoInterface {

	private $tableName = "comments";
	
	public function connect () {
		parent::connect();
	}
	
	/**
	 * @Override
	 */
	public function insert ($post) {
		if ( parent::postExist($post, array("comments_contents_id","comments_poster","comments_body")) ) {
			return parent::insertTable($this->tableName,"null,".$post["comments_contents_id"].",".$post["comments_poster"].",'".$post["comments_body"]."',now(),false");
		} else {
			return -1;
		}
	}
	
	/**
	 * @Override
	 */
	public function select ($post = null, $elem = "*", $conditions = "") {
		return parent::selectTable($this->tableName,$elem,"where content_id = {$post['comments_contents_id']} ");
	}
	
	/**
	 * @Override
	 */
	 public function update ($post) {
	     return parent::updateTable($this->tableName,$post);
	 }
	
}
?>