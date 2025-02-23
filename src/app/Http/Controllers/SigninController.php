<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAuthCodes;
use App\Service\Mailer;
use Exception;
use Illuminate\Http\Request;

class SigninController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function input()
    {
        return view('signin.input');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sendCode(Request $request)
    {
        $email = $request->input('email');

        $existsUser = User::query()->where('email', $email)->get()->first();
        if (is_null($existsUser)) {
            $errorMessage = "使用不可のメールアドレスです。";
            return view('/signin.confirm')->with(['isSuccess' => false, 'errorMessage' => $errorMessage]);
        }

        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        UserAuthCodes::create([
            'user_id' => $existsUser->id,
            'code' => $code,
            'expired_at' => now()->addMinutes(5)
        ]);

        $mailer = new Mailer();
        $mailer->setSubject('サインイン認証コード');
        $mailer->setAddress($email);
        $mailer->setBody($code);

        try {
            $mailer->send();
        } catch (Exception $e) {
            $errorMessage = "メール送信に失敗しました。";
            return view('/pre-signup.confirm')->with(['isSuccess' => false, 'errorMessage' => $errorMessage]);
        }

        return view('/signin.confirm')->with(['isSuccess' => true, 'email' => $email]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function verify(Request $request)
    {
        $email = $request->input('email');
        $code = $request->input('code');

        $authData = UserAuthCodes::query()
            ->join('users', 'user_auth_codes.user_id', '=', 'users.id')
            ->where('users.email', $email)
            ->where('user_auth_codes.code', $code)
            ->where('user_auth_codes.expired_at', '>=', now())
            ->where('user_auth_codes.auth_flag', 0)
            ->get()
            ->first();

        if (is_null($authData)) {
            $errorMessage = "認証に失敗しました。";
            return view('/signin.auth')->with(['isSuccess' => false, 'errorMessage' => $errorMessage]);
        }

        UserAuthCodes::query()
            ->where('id', $authData->id)
            ->update(['auth_flag' => 1]);

        return view('/signin.auth')->with(['isSuccess' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
