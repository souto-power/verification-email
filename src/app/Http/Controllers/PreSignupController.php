<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreSignupController extends Controller
{
    public function index()
    {
        return view('pre-signup.index');
    }

    public function register(Request $request)
    {
        $email = $request->input('email');
        return view('/pre-signup.registered')->with('message', '仮登録が完了しました。');
    }
}
