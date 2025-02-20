<?php

namespace App\Http\Controllers;

use App\Models\PreUser;
use Exception;
use Illuminate\Http\Request;

class PreSignupController extends Controller
{
    public function create()
    {
        return view('pre-signup.create');
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        $token = bin2hex(random_bytes(32));
        $url = "http://localhost:80/signup?urltoken=" . $token;

        try {
            PreUser::create([
                'token' => $token,
                'email' => $email,
                'requested_at' => now(),
            ]);
        } catch (Exception $e) {
            return view('/pre-signup.store')->with(['isSuccess' => false]);
        }

        return view('/pre-signup.store')->with(['isSuccess' => true, 'url' => $url]);
    }
}
