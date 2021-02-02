<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index(){
        return view('admin.roles.index', [
            'roles'=>Role::all()
        ]);
    }

    public function store(){
        request()->validate([
            'name'=>['required', 'min:3']
        ]);

        Role::create([
            'name'=>str::ucfirst(request('name')),
            'label'=>str::of(str::lower(request('name')))->slug('-')
        ]);

        return $this->index();        
    }

    public function update(Role $role){
        $role->name = str::ucfirst(request('name'));
        $role->label = str::of(request('name'))->slug('-');

        if($role->isDirty('name')){
            $role->save();
            session()->flash('role-updated', "Role updated to: " . request('name'));

        } else {
            session()->flash('role-updated', "Nothing Updated.");
        } 
        
        return $this->index();
    }

    public function edit(Role $role){
        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=>Permission::all()
            ]);
    }

    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();
    }

    public function destroy(Role $role){
        $role->delete();
        session()->flash('role-deleted', "'{$role->name}' has been deleted...");

        return $this->index();
    }
}
