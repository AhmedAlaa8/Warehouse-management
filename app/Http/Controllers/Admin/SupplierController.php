<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Supplier\SupplierDeleteRequest;
use App\Http\Requests\Admin\Supplier\SupplierStoreRequest;
use App\Http\Requests\Admin\Supplier\SupplierUpdateRequest;
use App\Http\Traits\CompanyTrait;
use App\Http\Traits\SupplierTrait;
use App\Models\Supplier;
use App\Models\UserProfile;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    use CompanyTrait,SupplierTrait;

    public $model;

    public function __construct(Supplier $supplier)
    {
        $this->model = $supplier;
    }

    public function index()
    {
        $suppliers = $this->getSuppliers(20);
        return view('admin.pages.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        $companies = $this->getCompanies();
        return view('admin.pages.supplier.create',compact('companies'));
    }

    public function show(Supplier $supplier)
    {
        $supplier->load('profile');
        return view('admin.pages.supplier.show',compact('supplier'));
    }

    public function store(SupplierStoreRequest $request)
    {
        $supplier = $this->model::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id,
        ]);
        UserProfile::create([
            'profilable_id' => $supplier->id,
            'profilable_type' => $supplier::class,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'home_phone' => $request->home_phone,
            'address' => $request->address,
            'type' => 'supplier',
            'job' => $request->job
        ]);
        Alert::toast('تم إنشاء الموَرِّد بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(Supplier $supplier)
    {
        $companies = $this->getCompanies();
        return view('admin.pages.supplier.edit',compact('supplier','companies'));
    }

    public function update(SupplierUpdateRequest $request, Supplier $supplier)
    {
        $supplier->update([
            'name' => $request->name,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'email' => $request->email,
            'company_id' => $request->company_id,
        ]);
        Alert::toast('تم تعديل الموَرِّد بنجاح', 'success');
        return redirect(route('admin.supplier.index'));
    }

    public function destroy(SupplierDeleteRequest $request,Supplier $supplier)
    {
        $supplier->delete();
        Alert::toast('تم حذف الموَرِّد بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $suppliers = $this->model::onlyTrashed()->paginate(20);
        return view('admin.pages.supplier.archive',compact('suppliers'));
    }

    public function trash(SupplierDeleteRequest $request)
    {
        $supplier = $this->model::withTrashed()->find($request->id);
        $supplier->forceDelete();
        Alert::toast('تم حذف الموَرِّد نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(SupplierDeleteRequest $request)
    {
        $supplier = $this->model::withTrashed()->find($request->id);
        $supplier->restore();
        Alert::toast('تم استعادة الموَرِّد', 'success');
        return redirect()->back();
    }
}
