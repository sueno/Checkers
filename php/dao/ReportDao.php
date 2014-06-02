<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class ReportDao extends DaoSuper implements DaoInterface {
	
	/**
	 * @Override
	 */
	public function select ($post = null, $elem = "*", $conditions = "") {
		if ( parent::postExist($post, array("contains_id")) ) {
			return parent::selectTable(
					"contents",
					"contents.id as content_id, title, user_id, user_name, body, content_date, count(cID) as comment_num",
					"join ( select id as cId from comment ) ".
					"join ( select id as user_id, name as user_name from users )");
		}
	}
	
}