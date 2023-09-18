<?php

$db_host    = "localhost"; // host
$db_user    = "root"; // user
$db_pw      = "php504"; // password
$db_db_name = "employees"; // DB name
$db_charset = "utf8mb4"; // charset
$db_dns     = "mysql:host=".$db_host.";dbname=".$db_db_name.";charset=".$db_charset;

// "mysql:host=localhost;dbname=employees;charset=utf8mb4"

$db_options = [
	PDO::ATTR_EMULATE_PREPARES      => false
	,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
	,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
];

$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);


// $sql =
// 	" INSERT INTO employees ( "
// 	." emp_no "
// 	." ,birth_date "
// 	." ,first_name "
// 	." ,last_name "
// 	." ,gender "
// 	." ,hire_date "
// 	." ) "

// 	." VALUES ( "
// 	." :emp_no "
// 	." ,:birth_date "
// 	." ,:first_name "
// 	." ,:last_name "
// 	." ,:gender "
// 	." ,:hire_date "
// 	." ) "
// ;

// $arr_ps = [
// 	":emp_no" => "500001"
// 	,":birth_date" => "19930921"
// 	,":first_name" => "sujin" 
// 	,":last_name" => "Yang"
// 	,":gender" => "F"
// 	,":hire_date" => "20230918" 
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $obj_conn->commit(); // 커밋

// $sql = 
// 	" UPDATE "
// 	." employees "
// 	." SET "
// 	." first_name = :first_name "
// 	." WHERE "
// 	." emp_no = :emp_no "
// 	;

// $arr_ps = [
// 	":emp_no" => "500001"
// 	,":first_name" => "DULIY" 
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $obj_conn->commit(); // 커밋

// $sql =
// 	" UPDATE "
// 	." employees "
// 	." SET "
// 	." last_name = :last_name "
// 	." WHERE "
// 	." emp_no = :emp_no "
// 	;

// $arr_ps = [
// 	":emp_no" => "500001"
// 	,":last_name" => "HOEIT" 
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $obj_conn->commit(); // 커밋

//삭제

$sql =
	" DELETE FROM employees "
	." WHERE "
	." emp_no = :emp_no ";

$arr_ps = [
	":emp_no" => "500001"
];

$stmt = $obj_conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$obj_conn->commit();