<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::get();
        return view('role-permission.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('role-permission.roles.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('admin/roles')->with('success','Role Created Successfully');
    }

    public function edit(Role $role)
    {

        return view('role-permission.roles.edit', ['role' => $role]);
    }

    public function update(Request $request, Role $role)
    {


        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('admin/roles')->with('status','Role Updated Successfully');
    }

    public function destroy($roleId)
    {

        $role = Role::find($roleId);
        $role->delete();
        return redirect('admin/roles')->with('status','Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId){

        $permissions = Permission::get();
        $role = Role::findorFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id', $role->id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();

        return view('role-permission.roles.add-permissions', ['role' => $role , 'permissions' => $permissions , 'rolePermissions' => $rolePermissions]);

    }

    public function givePermissionToRole(Request $request , $roleId){

        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);

        return redirect()->back()->with('status','Permissions added to role');
    }
}
