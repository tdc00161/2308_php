<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* del 231116 미들웨어로 이관
        로그인 체크
        if(!Auth::check()) {
            return redirect()->route('user.login.get');
        }
        */

        // 게시글 획득
        $result = Board::get();


    // auth 시행하면 session, cookies 에 정보를 저장해줌
        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //작성페이지로 이동할 때 사용
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //Request : 타입을 지정하는 것
    //$request : $_GET, $_POST 등 다 통합되어 들어있는 것
    {   
        $arrInputData = $request->only('b_title', 'b_content');
        $result = Board::create($arrInputData);
        // ([
        //     'id' => $request->b_id,
        //     'title' => $request->b_title,
        //     // 'hits'=> $request->b_hits,
        //     'content'=> $request->b_content,
        //     'created_at' => now()
        // ]);

        // 방법 2 (보통 save 는 업데이트때, 인서트때는 위에 온니로 많이 사용)
        // $model = new Board($arrInputData);
        // $model->save();

        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Board::find($id);
            // find를 사용 할 경우 해당하는 값만 가지고 옴
        // var_dump($result);
            //<방법2>
            // DB::table('boards')
            // ->SELECT('b_id','b_title','b_content','created_at')
            // ->where('b_id', $id)
            // //부등호 중에 = 만 중간에 들어갈 때 생략가능
            // ->get();

            //<방법3>
            //Board::where('b_id', $id)->get(); :옐로 퀀트

            
            //DB : 쿼리 빌더

            // 조회수 올리기
            $result->b_hits++; // 조회수 1증가
            $result->timestamps = false;

            // 업데이트 처리 (= save())
            $result->save(); //비긴트랙잭션 실행해줘야함

            // 오리진이 초기값 , 어트리뷰트가 업데이트할 때 수정되어짐
            
            // 업데이트 하는 과정 : 결과값 찾고 -> 결과값에 업데이트 할 수정내용 작성 -> 결과값 세이브하기.


        // var_dump($result);
        return view('detail')
        ->with('data',$result)
        ;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $result->find($id);
        $result = board::find($id);
        return view('update')->with('data',$result);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        // $result = 
        Board::find($id)
        ->update($request->only('b_title', 'b_content'));
        // ->save();

        return redirect()->route('board.show',$id);
        // 원래는 try catch 로 해줘야 함.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Board::find($id);
        $result->delete();

        return redirect()->route('board.index');
        
    }
}
