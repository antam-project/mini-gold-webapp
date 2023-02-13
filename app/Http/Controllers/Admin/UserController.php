<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(Request $request)
    {
        $users = User::whereNotNull('created_at');

        if ($request->search) {
            $users = $users->where('name', 'like', '%' . $request->search . '%');
        }
        $users = $users->with('roles')->paginate(10);
        return view('admin.user.list')->with('users', $users);
    }

    public function updatePage($id)
    {
        $user = User::where('id', $id)->with('roles')->first();

        if ($user == null) {
            toastr()->error('User tidak ditemukan');
            return redirect(route('admin.user.list'));
        }

        $roles = Role::all();
        return view('admin.user.edit')->with('user', $user)->with('roles', $roles);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->with('roles')->first();

        if ($user == null) {
            toastr()->error('User tidak ditemukan');
            return redirect(route('admin.user.list'));
        }

        if ($user->email == $request->email) {
            $user->update([
                'name' => $request->name
            ]);
        } else {
            $checkUserMail = User::where('email', $request->email)->get();
            if (count($checkUserMail) > 0) {
                toastr()->error('Email Already Registered');
                return redirect()->back()->withInput();
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

        }

        toastr()->success('User Updated Successfully');
        return redirect()->back();
    }

    public function addRole(Request $request, $idUser)
    {
        $userRole = UserRole::where('user_id', $idUser)->where('role_id', $request->idRole)->get();
        $user = User::where('id', $idUser)->with('roles')->first();
        if ($user == null) {
            toastr()->error('User tidak ditemukan');
            return redirect(route('admin.user.list'));
        }

        if (count($userRole) > 0) {
            toastr()->warning('This User already have this Role');
            return redirect()->back();
        }

        UserRole::create([
            'user_id' => $idUser,
            'role_id' => $request->idRole
        ]);
        toastr()->success('User Role Added Successfully');
        return redirect()->back();
    }

    public function deleteRole($idUser, $idRole)
    {
        $user = User::where('id', $idUser)->with('roles')->first();
        if ($user == null) {
            toastr()->error('User tidak ditemukan');
            return redirect(route('admin.user.list'));
        }

        $userRole = UserRole::where('user_id', $idUser)->where('role_id', $idRole)->first();
        $userRole->delete();

        toastr()->success('User Role Deleted Successfully');
        return redirect()->back();
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        if ($user == null) {
            toastr()->error('User tidak ditemukan');
            return redirect(route('admin.user.list'));
        }
        $user->delete();

        toastr()->success('User Deleted Successfully');
        return redirect()->back();
    }
}
