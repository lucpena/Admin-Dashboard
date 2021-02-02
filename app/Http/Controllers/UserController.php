<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    public function show(User $user){

        // Prevents users to view other users profile
        if($user['id'] != Auth()->user()->id) {
            abort(403, 'Access Denied.');
        }

        return view('admin.profile', [
            'user' => $user,
            'roles' => Role::all()
            ]);
    }

    public function update(User $user){
        $inputs = request()->validate([
            'username'=>['required', 'string', 'min:5', 'max:255', 'alpha_dash'],
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'avatar'=>['file']
        ]);
        
        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function attach(User $user){
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user){
        $user->roles()->detach(request('role'));
        return back();
    }

    public function destroy(User $user){
        $user->delete();
        session()->flash('user-deleted', "'{$user->name}' has been deleted...");
        return back();
    }
}
