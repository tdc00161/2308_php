<?php

namespace router;

use controller\UserController;
use controller\BoardController;

class Router {
    public function __construct() {
        $url = $_GET["url"];
        $method = $_SERVER["REQUEST_METHOD"];

        if($url === "user/login") {
            if($method === "GET") {
                new UserController("loginGet");
            } else {
                new UserController("loginPost");
            }
            //로그인
        } else if($url === "user/logout") {
            if($method === "GET") {
                new UserController("logoutGet");
            }
            //로그아웃
        //어떤기준으로 겟으로만 받고 포스트랑 둘 다 받고 하는 거지?

        //로그인화면에서 각각 동작들로 움직이는
        //받는 정보가 겟하고 포스트 둘 다 있어야해서 그런건가?
        } else if($url === "user/regist") {
            if($method === "GET") {
                new UserController("registGet");
            } else {
                new UserController("registPost");
            }
            //회원가입
        } else if($url === "board/list") {
            if($method === "GET") {
                new BoardController("listGet");
            }
        } else if($url === "board/add") {
            if($method === "GET") {
                //값을 안적어도 괜찮은가?
            } else {
                new BoardController("addPost");
            }
            //작성페이지
        } else if($url === "board/detail") {
            if($method === "GET") {
                new BoardController("detailGet");
            }
            //상세페이지
        }


        // 없는 경로일 경우
        echo "이상한 URL : " .$url;
    }
}