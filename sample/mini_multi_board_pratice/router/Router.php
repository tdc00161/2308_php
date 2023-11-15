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
        }


        // 없는 경로일 경우
        echo "이상한 URL : " .$url;
    }
}