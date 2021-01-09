<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserProfileRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profileForm()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('user.profile', compact('user'));
    }

    public function userProfile(UserProfileRequest $request)
    {
       $user = User::findOrFail(auth()->user()->id);

       $user->name = $request->name;
       $user->email = $request->email;

       if($request->user_image) {
           $imageName = date('YmdHis'). "." . $request->user_image->getClientOriginalExtension();
           $request->user_image->move(public_path('images'), $imageName);
           $user->image = $imageName;
       }

       $user->save();

       return redirect()->route('user');

    }

    public function changePassword(ChangePasswordRequest $request)
    {
        User::where('id', auth()->user()->id)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('user');
    }
}
