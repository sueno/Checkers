<?php
require_once 'DaoInterface.php';
require_once 'DaoSuper.php';

class ReportDao extends DaoSuper implements DaoInterface {

	/**
	 * @Override
	 */
	public function insert ($post) {
		return -1;
	}
	
	/**
	 * @Override
	 */
	public function select ($post = null, $elem = "", $conditions = "") {
		if ( parent::postExist($post, array()) ) {
			if ($conditions!="") {
				$conditions = "and ".$conditions;
			}
			
			return parent::selectTable(
					"contents",
					"contents.id as content_id, title, users.id as user_id, users.name as user_name, contents.body as body, content_date, contents.delete_flg as delete_flg, count(comments.id) as comment_num {$elem} ",
// 					"where contents.user_id = users.id ".
// 					"and contents.id = comments.content_id ".
// 					" {$conditions} ".
// 					"group by contents.id ".
// 					"order by content_date desc");
// 					"join comments ".
// 					"join users ".
// 					"on contents.id = comments.content_id ".
// 					"and contents.user_id = users.id ".
// 					" {$conditions} ".
// 					"order by content_date");
					"join users ".
					"left join comments ".
					"on contents.user_id = users.id ".
					"and contents.id = comments.content_id ".
					" {$conditions} ".
					"group by contents.id ".
					"order by contents.content_date desc");
		}
	}

	/**
	 * @Override
	 */
	public function update ($post) {
		return false;
	}
}