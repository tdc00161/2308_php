<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MyUserValidation
{
    // 파일 생성 명령어
    // php artisan make:middleware 미들웨어명
    

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    //php에서 행동하는 것을 자동으로 처리해주는거
    //자바스크립트에서 이벤트랑 비슷한 역할
    {
        Log::debug("**********유저 유효성 체크 시작");
        //우리가 생각해야할 것: 어떤 처리를 해 줄 것인가

        // 처리

        // 항목 리스트
        $arrBaseKey = [
            'email'
            ,'name'
            ,'password'
            ,'passwordchk'
        ];

        // 유효성 체크 리스트
        $arrBaseValidation= [
            'email' => 'required|email|max:50'
            // '검사할 값' => '필수사항에서는 required 작성 |(또는)email|
            ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
            ,'password' => 'required'
            ,'passwordchk' => 'same:password'
            // 전화번호 정규식 regex:/^

        ];

        // request 파라미터

        $arrRequestParam = [];
        
        foreach ($arrBaseKey as $val) {
            if($request->has($val)) {
                $arrRequestParam[$val] = $request->$val;
            } else {
                unset($arrBaseValidation[$val]);
            }
            // Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
            // Log::debug("유효성 체크 리스트 획득", $arrBaseValidation);
            // 두번째값은 항상 배열로 와야 함
        }

        $arrRequestParam = $request->all(); //보내온 정보의 모든 값을 가지고 옴
        // Log 로 찍는 방법 Log::debug("리퀘스트 파라미터 획득". $arrRequestParam)
        
        
        // 유효성 검사
        $validator = Validator::make(
            $arrRequestParam, $arrBaseValidation
        );
        // var_dump($validator->errors()->all());

        // 유효성 검사 실패시 처리
        if($validator->fails()){
                return redirect('/'.$request->path())->withErrors($validator->errors());
        }

        Log::debug("유저 유효성 체크 마침");
        return $next($request);
        
    }
}
