<?php

namespace App\Http\Controllers;

use App\Models\PreUser;
use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $urltoken = $request->input('urltoken');

        $preUserData = PreUser::query()->where('token', $urltoken)->where('expired_at', '>=', now())->get()->first();

        if (is_null($preUserData)) {
            return view('signup.create')->with(['isSuccess' => false]);
        }

        PreUser::query()->where('token', $urltoken)->delete();

        return view('signup.input')->with(['isSuccess' => true, 'email' => $preUserData->email]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');

        User::create([
            'email' => $email,
            'name' => $name,
        ]);

        return view('signup.store')->with(['isSuccess' => true]);
    }
}
