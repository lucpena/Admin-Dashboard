<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PermissionController extends Controller
{
    public function index(){
        return view('admin.permissions.index', [
            'permissions'=>Permission::all()
        ]);
    }

    public function store(){
        request()->validate([
            'name'=>['required', 'min:3']
        ]);

        Permission::create([
            'name'=>str::ucfirst(request('name')),
            'label'=>str::of(str::lower(request('name')))->slug('-')
        ]);

        return back();
    }

    public function edit(Permission $permission){
        return view('admin.permissions.edit', ['permission'=>$permission]);
    }

    public function update(Permission $permission){
        $permission->name = str::ucfirst(request('name'));
        $permission->label = str::of(request('name'))->slug('-');
        
        if($permission->isDirty()){
            $permission->save();
            session()->flash('permission-updated', "Permission updated to: " . request('name'));
        } else {
            session()->flash('permission-updated', "Nothing Updated.");
        }


        return $this->index();
    }

    public function destroy(Permission $permission){
        $permission->delete();
        return back();
    }
}
