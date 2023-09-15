<?php

// class 는 동종의 객체들이 모여있는 집합을 정의한 것


class ClassRoom {
    // 멤버필드

    // 접근제어 지시자 : public, private, protected
    // 멤버 변수
    public $computer; // 어디에서나 접근 가능
    private $book; // class 내에서만 접근 가능
    protected $bag; // class와 나를 상속 받은 자식 class 내에서만 접근 가능

    ////////////////
    // 생성자(constructor) : 
    //     - 클래스를 이용하여 객체를 생성할 때 사용
           - 생성자를 


    // 메소드(method) : class 내에 있는 함수
    public function class_room_set_value() {
        $this->computer = "컴퓨터";
        $this->book = "책";
        $this->bag = "가방";
    }

    public function classRoomPrint() {
        echo 
    }

    // getter 메소드
    public function get_now() {
        return $this -> now;
    }

    // setter 메소드
    public function set_now() {
        $this -> now = "9999-01-01 00:00:00";
    }


    // static : instance 생성
    public static function static_test() {
        echo "스태틱 메소드";
    }

}

// class instance 생성
// $obj_classroom = new ClassRoom();
// var_dump($obj_classroom->computer);

// static객체 사용 방법
ClassRoom :: static_test();