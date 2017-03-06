<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use App\Modules\User\Models\User;
use App\Modules\User\Models\Role;
use App\Modules\User\Models\RoleUser;
use Lang;
use Datatables;

/**
 * IndexController
 *
 * Controller to all the properties uith user module.
 * login, user crud, listing and more
 */
class IndexController extends Controller {

    public function index() {
        return view('User::login');
    }

    //Login Module
    public function loginUser(\App\Http\Requests\LoginRequest $request) {
        $userdata = array(
            'email' => $request->input('username'),
            'password' => $request->input('password')
        );
        if (Auth::attempt($userdata)) {
            return redirect('dashboard');
        } else {
            return redirect('login')->withErrors([$request->input('username') => $this->getFailedLoginMessage()]);
        }
    }

    protected function getFailedLoginMessage() {
        return Lang::has('auth.failed') ? Lang::get('auth.failed') : 'wrong username / password';
    }

    public function logoutUser() {
        Auth::logout();
        return redirect('login');
    }

    //User Module
    public function allUsers() {
        return view('User::all_users');
    }

    public function getUsers() {
        //$users = User::all();
        $users = RoleUser::join('users', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select(['users.id as id', 'users.name', 'users.email', 'roles.display_name']);
        return Datatables::of($users)
                        ->addColumn('Link', function ($users) {
                            return '<a href="' . url('/users') . '/' . $users->id . '/edit' . '"' . 'class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->setRowId('id')
                        ->make(true);
    }

    public function createUsers() {
        $getRoles = Role::all();
        return view('User::create_users')->with('getRoles', $getRoles);
    }

    public function createUsersProcess(\App\Http\Requests\UserRequest $request) {

        $addUsers = new User();

        $addUsers->name = $request->input('fullname');
        $addUsers->email = $request->input('uemail');
        $addUsers->password = bcrypt($request->input('upassword'));

        $addUsers->save();

        $userID = $addUsers->id;
        $roleID = $request->input('uroles');

        $user = User::find($userID);
        $role = Role::where('id', '=', $roleID)->get()->first();
        $user->attachRole($role);

        return redirect('allusers');
    }

    public function editUsers($id) {
        $editUser = User::where('id', '=', $id)->get();
        $getRoles = Role::leftJoin('role_user', function($join) use ($id) {
                    $join->on('role_user.role_id', '=', 'roles.id')->where('role_user.user_id', '=', $id);
                })->get();

        return view('User::edit_users')->with('getRoles', $getRoles)->with('editUser', $editUser);
    }

    public function editUsersProcess(\App\Http\Requests\UserUpdateRequest $request) {
        $userID = $request->input('uid');        
        $password = $request->input('upassword');
        
        $addUsers = User::findOrFail($userID);

        $addUsers->name = $request->input('fullname');
        $addUsers->email = $request->input('uemail');

        if (isset($password) && $password != '') {
            $addUsers->password = bcrypt($password);
        }
        $addUsers->save();
        
        $dRoleUser = RoleUser::where('user_id', '=', $userID)->delete();

        $roleID = $request->input('uroles');

        $user = User::find($userID);
        $role = Role::where('id', '=', $roleID)->get()->first();
        $user->attachRole($role);

        return redirect('users/'.$userID.'/edit');
    }

}
