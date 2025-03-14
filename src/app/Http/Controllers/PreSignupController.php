<?php

namespace App\Http\Controllers;

use App\Models\PreUser;
use App\Models\User;
use App\Service\Mailer;
use Exception;
use Illuminate\Http\Request;

class PreSignupController extends Controller
{
    public function input()
    {
        return view('pre-signup.input');
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        $existsUser = User::query()->where('email', $email)->exists();
        if ($existsUser) {
            $errorMessage = "使用不可のメールアドレスです。";
            return view('/pre-signup.store')->with(['isSuccess' => false, 'errorMessage' => $errorMessage]);
        }

        $token = bin2hex(random_bytes(32));
        $url = "http://localhost:80/signup?urltoken=" . $token;

        try {
            PreUser::create([
                'token' => $token,
                'email' => $email,
                'expired_at' => now()->addMinutes(5),
            ]);
        } catch (Exception $e) {
            $errorMessage = "仮登録に失敗しました。";
            return view('/pre-signup.store')->with(['isSuccess' => false, 'errorMessage' => $errorMessage]);
        }

        $mailer = new Mailer();
        $mailer->setSubject('本登録のお知らせ');
        $mailer->setAddress($email);
        $mailer->setBody($url);

        try {
            $mailer->send();
        } catch (Exception $e) {
            $errorMessage = "メール送信に失敗しました。";
            return view('/pre-signup.store')->with(['isSuccess' => false, 'errorMessage' => $errorMessage]);
        }

        return view('/pre-signup.store')->with(['isSuccess' => true]);
    }
}
