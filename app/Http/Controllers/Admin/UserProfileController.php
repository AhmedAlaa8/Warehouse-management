<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserProfile\UserProfilStoreRequest;
use App\Models\User;
use App\Models\UserProfile;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileController extends Controller
{
    public $model;

    public function __construct(UserProfile $userProfile)
    {
        $this->model = $userProfile;
    }

    public function create(User $user)
    {
        return view('admin.pages.userProfile.create',compact('user'));
    }

    public function store(UserProfilStoreRequest $request)
    {
        $this->model::updateOrCreate([
            'user_id' => $request->user_id,
        ],[
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'home_phone' => $request->home_phone,
            'address' => $request->address,
            'job' => $request->job,
            'type' => $request->type,
            'credit' => $request->credit ?? 0,
            'total_paid' => $request->total_paid ?? 0,
            'total_earned' => $request->total_earned ?? 0,
        ]);
        Alert::toast('تم إنشاء البيانات بنجاح', 'success');
        return redirect()->back()->withInput();
    }
}
