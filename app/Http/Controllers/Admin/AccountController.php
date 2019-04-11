<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read-account');
        return view('backend.account.show');
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id','name','email','phone']);
            return DataTables::of($users)
                    ->addColumn('action',function ($user){
                        return view('backend.account._action',compact('user'));
                    })
                    ->rawColumns(['action'])->make(true);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create-account');
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $user->roles()->attach($request->role);
        return "Thêm tài khoản thành công!!";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update-account');
        $user = User::findOrFail($id);
        return response()->json($user, 200);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update-account');
        $this->validate($request,
        [
            'name'     => 'required|min:4',
            'email'    => 'required|email|unique:users,email,'.$id,'id',
            'phone'    => 'required|string',
            'password' => 'sometimes|nullable'
        ]);
        $data = $request->all();
        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        $user->update($data);
        return 'Cập nhật thành công';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete-account');
        User::destroy($id);
        return "Xóa tài khoản thành công";
    }
}
