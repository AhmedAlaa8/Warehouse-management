<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\RoleDeleteRequest;
use App\Http\Requests\Admin\Role\RoleStoreRequest;
use App\Http\Requests\Admin\Role\RoleUpdateRequest;
use App\Http\Traits\RoleTrait;
use App\Models\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    use RoleTrait;

    public $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function index()
    {
        $roles = $this->getRoles(20);
        return view('admin.pages.role.index', compact('roles'));
    }

    public function show(Role $role)
    {
        return view('admin.pages.role.show',compact('role'));
    }

    public function create()
    {
        return view('admin.pages.role.create');
    }

    public function store(RoleStoreRequest $request)
    {
        $this->model::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        Alert::toast('تم إنشاء الدور بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(Role $role)
    {
        return view('admin.pages.role.edit',compact('role'));
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        Alert::toast('تم تعديل الدور بنجاح', 'success');
        return redirect(route('admin.role.index'));
    }

    public function destroy(RoleDeleteRequest $request,Role $role)
    {
        $role->delete();
        Alert::toast('تم حذف الدور بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $roles = $this->model::onlyTrashed()->paginate(20);
        return view('admin.pages.role.archive',compact('roles'));
    }

    public function trash(RoleDeleteRequest $request)
    {
        $role = $this->model::withTrashed()->find($request->id);
        $role->forceDelete();
        Alert::toast('تم حذف الدور نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(RoleDeleteRequest $request)
    {
        $role = $this->model::withTrashed()->find($request->id);
        $role->restore();
        Alert::toast('تم استعادة الدور', 'success');
        return redirect()->back();
    }
}
