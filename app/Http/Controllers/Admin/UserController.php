<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('admins')->get();
        return view('backend.user.show',compact('roles'));
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = Admin::select(['id','name','email','phone']);
            return DataTables::of($users)
                    ->addColumn('action',function ($user){
                        return view('backend.user._action',compact('user'));
                    })
                    ->addColumn('role',function ($user){
                        return view('backend.user._role',compact('user'));
                    })
                    ->rawColumns(['action', 'role'])->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = Admin::create($data);
        $user->roles()->attach($request->role);
        return "Thêm tài khoản thành công!!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        $data = [
            'user' => $user,
            'role' => $user->roles
        ];
        return response()->json($data, 200);;
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
        $this->validate($request,
        [
            'name'     => 'required|min:4',
            'email'    => 'required|email|unique:users,email,'.$id,'id',
            'phone'    => 'required|string',
            'password' => 'sometimes|nullable'
        ]);
        $data = $request->all();
        if ($request->has('password')) {
            $data['password'] = $request->password;
        }
        $user = Admin::findOrFail($id);
        $user->update($data);
        $user->roles()->sync($request->role);
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
        Admin::destroy($id);
        return "Xóa tài khoản thành công";
    }
}
