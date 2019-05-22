<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('frontend.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'phone'   => 'required',
            'address' => 'required|string',
        ]);
        Auth::user()->update($request->only('name','phone','address'));
        return redirect()->route('profile.index')->with('success','Your profile has been updated!');
    }


    public function getChangePass(){
        return view('frontend.profile.password');
    }

    public function postChangePass(Request $request){
        $request->validate([
            'old_password'              => 'required',
            'new_password'              => 'required|confirmed|min: 6',
            'new_password_confirmation' => 'required'
        ]);
        $new_pass = $request->new_password;

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error','Mật khẩu cũ không chính xác');
        }

        if ($new_pass == $request->old_password) {
            return back()->with('error', 'Mật khẩu mới ko đc trùng với mật khẩu cũ');
        }

        $user = auth('web')->user();
        $user->password = Hash::make($new_pass);
        $user->save();

        return back()->with('success','Thay đổi thành công');
    }
}
