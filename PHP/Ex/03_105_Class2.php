<?php

// namespace : 클래스를 구분해주기 위해 설정, 보통은 해당파일의 패스로 작성
namespace up;

class Class1 {

    public function __construct() {
        echo "위에 클래스1";
    }

}

namespace down;

class Class1 {

    public function __construct() {
        echo "밑에 클래스1";
    }

}

// namespace 를 이용해서 객체를 지정
// $obj_class1 = new \down\Class1();

use \up\class1;

$;


