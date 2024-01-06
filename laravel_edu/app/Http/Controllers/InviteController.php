<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\user_tokens;


class InviteController extends Controller
{
    // 프로젝트 초대링크
    public function sendInvite() {
       
        $user = Auth::user();

        $invitation = user_tokens::create([
            'invite_token' => Str::random(32),
            'sender_user_id' => 3,
        ]);

        $inviteLink = URL::signedRoute('invite', ['token'=> $invitation->invite_token]);
        
       return view('invite')->with('inviteLink',$inviteLink);
       
        // $user = auth::user();

        // 초대 토큰
        // $token = Str::random(30);
        // $time = now()->addMinute(2);

        // $inviteLink = URL::signedRoute('invite', ['token' => $token, '$time' => $time]);
    
        // ProjectRequest::create(['invite_token' => $inviteLink,'sender_user_id' => $user->id]);
    
        // return view('invite')
        // ->with('inviteLink',$inviteLink);
    }
    
    public function acceptInvite(Request $request) {

    
        $token = $request->input('token');
        $invite = user_tokens::where('invite_token',$token)->first();

        if (!$request->hasValidSignature()) {
            abort(403);
        }

        return redirect()->route('login.get');

    }
}
