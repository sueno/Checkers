<?php
class DaoSuper {
	
	private $link;
	
	public function connect() {
		$this->link = mysql_connect('localhost', 'root', 'root');
		$conn = mysql_select_db( 'NextGroupWorkDB', $this->link );
	}
	
	public function insertTable ($tableName, $values) {
		$__tableName = htmlspecialchars($tableName);
		$__values = htmlspecialchars($values);
		$sql = "insert into {$__tableName} values ({$__values})";
		if (empty($this->resultCheck($this->execSQL($sql)))) {
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
	
	public function update () {
		//TODO not implementation
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
}
?>