<?php
require_once 'DaoInterface.php';

abstract class DaoSuper implements DaoInterface {
	
	private $link;
	public $errorLog = "";
	
	
	/**
	 * @Override
	 */
	public function connect() {
// 		$this->link = mysql_connect('localhost', 'root', 'root');
		$this->link = mysql_connect('127.7.252.129', 'nohohon', '');
		$conn = mysql_select_db( 'NextGroupWareDB', $this->link );
	}
	
	public function insertTable ($tableName, $values) {
		$__tableName = htmlspecialchars($tableName);
		$__values = htmlspecialchars($values);
		$sql = "insert into {$__tableName} values ({$__values})";
		$this->resultCheck = $this->resultCheck($this->execSQL($sql));
		if (empty($this->resultCheck)) {
			return mysql_insert_id();
		} else {
			return -1;
		}
	}
	
	public function selectTable ($tableName, $elem = "*", $condition = "") {
		$sql = "select {$elem} from {$tableName} {$condition}";
		print($sql);
		$result = $this->execSQL($sql);
		
		$resultArray = array();
		while ( $data = mysql_fetch_assoc( $result ) ) {
			$resultArray[] = $data;
		}
		return $resultArray;
	}
	
	public function updateTable ($tableName, $post) {
	     if ( parent::postExist($post, array($tableName."_id")) ) {
	        
	     }
	 }
	
	private function execSQL ($sql) {
		$sql_utf8 = mb_convert_encoding($sql, "UTF-8", "auto");
		return mysql_query( $sql_utf8, $this->link );
	}
	
	private function resultCheck ($result) {
		$ret = "";
		if ( !$result ) {
			$ret .= "SQL文の発行に失敗しました。<br />";
			$ret .= mysql_error( $this->link );
		} else {
		}
		return $ret;
	}
	
	public function postExist ($post, $existList) {
	    $flag = true;
	    foreach ($existList as $elem) {
	        $flag &= ( !empty($post[$elem]) && isset($post[$elem]) );
	    }
	    return $flag;
	}
	
	public function getTableCalumnExistList ($post, $tableName) {
	    $list = array();
	    $rows = mysql_query('SHOW COLUMNS FROM '.$tableName, $this->link);
        while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
	        foreach ($existList as $elem) {
	            if ( !empty($post[$row['Field']]) && isset($post[$row['Field']]) ) {
	                $list[$row['Field']] = $post[$row['Field']];
	            }
	        }
        }
	    return $list;
	}
}
?>