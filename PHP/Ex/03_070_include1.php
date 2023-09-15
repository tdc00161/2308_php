<?php


// include : 해당 파일을 불러옵니다. 오류발생 시 프로그램을 정지하지 않습니다.
include("./02_070_include2.php");

// require : 해당 파일을 불러옵니다. 오류 발생 시 프로그램을 정지합니다.
require("./02_070_include2.php");


include_once("./02_070_include2.php");
require_once("./02_070_include2.php");

echo "include 11111\n";

