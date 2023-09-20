<?php

// 1. db_conn 이라는 함수를 만들어주세요.
//    1-1. 기능 : db설정 및 pdo 객체 생성

function my_db_conn( &$conn ) { 
	$db_host    = 'localhost';
	$db_user    = 'root';
	$db_pw      = 'php504';
	$db_sb_name = "employees";
	$db_charset = "utf8mb4";
	$db_dns     = "mysql:host=".$db_host.";dbname=".$db_sb_name.";charset=".$db_charset;

	$db_options = [
		PDO::ATTR_EMULATE_PREPARES      => false
		,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
		,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
];

	$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

}

$conn = null;
my_db_conn($conn);

// // 2. 현재 급여가 80,000이상인 사원을 조회하기

// $sql = 
// 	" SELECT " // 조회하기
// 	." * " // 전체를 가져와야하기때문
// 	." FROM "
// 	." salaries " //급여가 필요하기때문
// 	." WHERE "
// 	." salary >= :salary " // 조건이 급여가 80,000이상 이라서
// 	." AND "
// 	." to_date >= NOW() " // 조건이 현재 급여이기 때문
// 	;

// $arr_ps = [ //변수를 사용하여 보안적으로 보호하기위해서
//  	":salary" => 80000
// ];


// $stmt = $conn->prepare($sql);
// $stmt->execute($arr_ps);
// $result = $stmt->fetchALL();
// // print_r($result);

// // 3. 조회한 데이터를 루프하면서 100,000이상이면 사원 번호 출력해주세요.
// $cnt = 0;
// foreach($result as $salaries) {
// 	if($salaries["salary"] >= 100000) {
// 		echo $salaries["emp_no"]."\n";
// 		$cnt++;
// 	}
// }
// echo $cnt;



//숙제
// 1. titles 테이블에 데이터가 없는 사원을 검색

$sql = "SELECT"
	." * "
	." FROM "
	." employees "
	." where "
	." emp_no "
	." not exists "
	." ( "
	." select "
	." emp_no "
	." from "
	." titles "
	." ) "
	;

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchALL();

// 2. [1]번에 해당하는 사원의 직책 정보를 insert
// 		2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101

$sql = " INSERT INTO "
	." titles "
	." VALUES ( "
	." :emp_no "
	." ,:title "
	." ,now() "
	." ,:to_date "
	." ) "
	;

$arr_ps = [
	":emp_no" => 700000
	,":title" => "green"
	,":to_date" => 99990101
];

// 3. 디비에 저장될 것

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$conn->commit();
