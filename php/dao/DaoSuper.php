<?php
require_once 'DaoInterface.php';

abstract class DaoSuper implements DaoInterface {
	
	private $link;
	public $errorLog = "";
	
	
	/**
	 * @Override
	 */
	public function connect() {
		$this->link = mysql_connect('localhost', 'root', 'root');
		$conn = mysql_select_db( 'NextGroupWareDB', $this->link );

// 		try {
// 			$pdo = new PDO('mysql:host=localhost;dbname=NextGroupWareDB;charset=utf8','root','root',
// 					array(PDO::ATTR_EMULATE_PREPARES => false));
// 		} catch (PDOException $e) {
// 			exit('DB connection failed.'.$e->getMessage());
// 		}
	}
	
	abstract public function insert($post);
	abstract public function select($post, $elem, $conditions);
	abstract public function update($post);
	
	public function insertTable ($tableName, $values) {
		$__tableName = htmlspecialchars($tableName);
		$__values = htmlspecialchars($values);
		$sql = "insert into {$__tableName} values ({$__values})";
		
		echo $sql."<br />";
		
		$this->errorLog = $this->resultCheck($this->execSQL($sql));
		if (empty($this->errorLog)) {
			return mysql_insert_id();
		} else {
			return -1;
		}
	}
	
	public function selectTable ($tableName, $elem = "*", $condition = "") {
		$sql = "select {$elem} from {$tableName} {$condition}";
		print($sql."<br>");
		$result = $this->execSQL($sql);
		
		$resultArray = array();
		while ( $data = mysql_fetch_assoc( $result ) ) {
			$resultArray[] = $data;
		}
		
// 		echo "SQL SELECT  ".$tableName."<br />";
// 		var_dump($resultArray);
		
		return $resultArray;
	}
	
	public function updateTable ($tableName, $post) {
		$updateColumn = $this->getTableCalumnExistList($post, $tableName);
		$id = $tableName."_id";
	     if ( $this->postExist($post, array($id)) && $updateColumn!=null ) {
	     	$input = array();
	     	foreach ($updateColumn as $key=>$value) {
	     		$input->add(" {$key} = {$value} ");
	     	}
	     	$inputAll = implode(",",$input);
	     	$sql = "update {$tableName} set {$inputAll} where id = $post[$id] ";
			$this->errorLog = $this->resultCheck($this->execSQL($sql));
			if ($this->errorLog=="") {
				return true;
			} else {
				return false;
			}
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
	
	public function getResultCheck() {
		return $this->errorLog;
	}
	
	public function postExist ($post, $existList) {
	    $flag = true;
	    foreach ($existList as $elem) {
	        $flag &= ( array_key_exists($elem, $post) );
	        if (!$flag) print(" *".$elem);
	    }
	    return $flag;
	}
	
	public function getTableCalumnExistList ($post, $tableName) {
	    $list = array();
	    $rows = mysql_query("SHOW COLUMNS FROM {$tableName}", $this->link);
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