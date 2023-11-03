<?php


namespace model;

use PDO;
use Exception;

class ParentsModel {
	protected $conn;

	// 생성자
	public function __construct() {
		$db_dns     = "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
	
		try{
			$db_options = [
				PDO::ATTR_EMULATE_PREPARES      => false
				,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
				,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
			];
	
		// PDO Class로 DB 연동
			$this->conn = new PDO($db_dns, _DB_USER, _DB_PW, $db_options);

		} catch (Exception $e) {
			echo "DB Connect Error : ".$e -> getMessage();
			exit();
		}
	}

	// DB 파기
	public function destroy() {
		$this -> conn = null;
	}

	//
	public function beginTransaction() {
		$this -> conn ->beginTransaction();
	}

	//commit
	public function commit() {
		$this->conn->commit();
	}

	// rollBack
	public function rollBack() {
		$this->conn->rollBack();
	}


}