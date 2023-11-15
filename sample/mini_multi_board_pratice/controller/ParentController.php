<?php

namespace controller;

// use model\BoardNameModel;


class ParentController {

    protected $controllerChkUrl;

    public function __construct($action) {
        $this->controllerChkUrl = $_GET[url];

        if(!isset($session)){
            session_start();
            // 세션을 의무적으로 스타트를 해야하는 것인가?
            // 해야한다면 고객의 정보가 들어왔을때 비교하기위해서 저장해놓기 위한 용도로 쓰이는 건가?
            // csrf? 대비(?)   
        }

        $this->chkAuthorization(); // 유저 로그인 및 권한 체크 



    }
}