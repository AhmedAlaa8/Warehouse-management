<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolePermission\AddRoleUserRequest;
use App\Http\Traits\PermissionTrait;
use App\Http\Traits\RoleTrait;
use App\Http\Traits\UserTrait;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\User;
use App\Services\Authorization\PermissionsService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RolePermissionController extends Controller
{
    use RoleTrait,
    PermissionTrait,
    UserTrait;

    private $permissionsService;
    private Role $roleModel;
    private Permission $permissionModel;
    private PermissionRole $permissionRoleModel;
    private User $userModel;

    public function __construct(
        PermissionsService $permissionsService,
        Role $role,
        Permission $permission,
        PermissionRole $permissionRole,
        User $user
        )
    {
        $this->permissionsService = $permissionsService;
        $this->roleModel = $role;
        $this->permissionModel = $permission;
        $this->permissionRoleModel = $permissionRole;
        $this->userModel = $user;
    }

    public function index()
    {
        $roles = $this->getRoles();
        $permissions = $this->getPermissions();
        $tablesPermission = $this->permissionsService->tablesPermission();
        return view('admin.pages.rolePermission.index',compact('roles','permissions','tablesPermission'));
    }

    public function addRolePermission(Request $request)
    {
        $role = $this->roleModel::find($request->role_id);
        $permissionNames = $request->permission;
        if(is_null($permissionNames))
        {
            toast('الصلاحيات غير موحوده','error');
            return redirect()->back();
        }
        if(!$role)
        {
            toast('الدور غير موحوده','error');
            return redirect()->back();
        }

        $this->permissionRoleModel::where('role_id',$role->id)->delete();

        foreach($permissionNames as $permissisonName)
        {
            $permission = $this->permissionModel::where('name',$permissisonName)->first();
            $role->attachPermission($permission);
        }
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getRolePermissions(Role $role)
    {
        return $role->permissions;
    }

    public function addRoleUserPage()
    {
        $roles = $this->getRoles();
        $users = $this->getUsers();
        return view('admin.pages.rolePermission.addRoleUser',compact('users','roles'));
    }

    public function addRoleUser(AddRoleUserRequest $request)
    {
        $role = $this->roleModel::find($request->role_id);
        $user = $this->userModel::find($request->user_id);
        if(! $user->is_admin)
        {
            toast(' المستخدم ليس ادمن او موظف ','error');
            return redirect()->back();
        }
        $user->attachRole($role);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }
}
