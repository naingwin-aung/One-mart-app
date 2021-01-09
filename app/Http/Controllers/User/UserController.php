<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePasswordForm($user_id)
    {
        return view('user.change_password', compact('user_id'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        User::where('id', $request->user_id)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('user');
    }
}
