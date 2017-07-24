<?php

namespace App\Http\Controllers\Api;

use App\AuthenticationToken;
use function App\me;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;

class ApiController extends Controller
{
    public function token()
    {
        $validation = \Validator::make(Input::all(), [
            'username' => ['required'],
            'password' => ['required']
        ]);
        if ($validation->fails())
            return ['error'=>$validation->errors()->first()];
        if ( ! Auth::attempt(['email' => User::where('username', Input::get('username'))->first()->email, 'password' => Input::get('password')]))
            return ['error'=>'Incorrect login'];
        $token = str_random(48);
        while(AuthenticationToken::whereToken($token)->exists())
            $token = str_random(48);
        $userId = Auth::id();
        if ( ! is_null($authToken = AuthenticationToken::whereUserId($userId)->first()))
            $authToken->delete();
        $authToken = AuthenticationToken::create([
            'token' =>  $token,
            'user_id' => $userId,
            'additional' => Input::get('additional', []),
            'expire_at' => date('Y-m-d H:i:s', strtotime('+3 month'))
        ]);
        return ['token'=>$authToken->token];
    }

    public function user()
    {
        return me();
    }
}