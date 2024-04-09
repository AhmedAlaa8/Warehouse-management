<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserDeleteRequest;
use App\Http\Requests\Admin\User\UserStoreRequest;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Http\Traits\UserTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    use UserTrait;
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index()
    {
        $users = $this->getUsers(20);
        return view('admin.pages.user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.pages.user.show',compact('user'));
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = $this->model::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? 0
        ]);

        Alert::toast('تم إنشاء المستخدم بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(User $user)
    {
        return view('admin.pages.user.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin ?? false
        ]);
        Alert::toast('تم تعديل المستخدم بنجاح', 'success');
        return redirect(route('admin.user.index'));
    }

    public function destroy(UserDeleteRequest $request,User $user)
    {
        $user->delete();
        Alert::toast('تم حذف المستخدم بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $users = $this->model::onlyTrashed()->paginate(20);
        return view('admin.pages.user.archive',compact('users'));
    }

    public function trash(UserDeleteRequest $request)
    {
        $user = $this->model::withTrashed()->find($request->id);
        $user->forceDelete();
        Alert::toast('تم حذف المستخدم نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(UserDeleteRequest $request)
    {
        $user = $this->model::withTrashed()->find($request->id);
        $user->restore();
        Alert::toast('تم استعادة المستخدم', 'success');
        return redirect()->back();
    }
}
