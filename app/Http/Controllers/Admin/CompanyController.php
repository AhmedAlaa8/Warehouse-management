<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyDeleteRequest;
use App\Http\Requests\Admin\Company\CompanyStoreRequest;
use App\Http\Requests\Admin\Company\CompanyUpdateRequest;
use App\Http\Traits\CompanyTrait;
use App\Models\Company;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    use CompanyTrait;

    public $model;

    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    public function index()
    {
        $companies = $this->getCompanies(20);
        return view('admin.pages.compnay.index', compact('companies'));
    }

    public function show(Company $company)
    {
        return view('admin.pages.compnay.show', compact('company'));
    }

    public function create()
    {
        return view('admin.pages.compnay.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $this->model::create([
            'name' => $request->name,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'address' => $request->address,
            'manager_name' => $request->manager_name,
            'manager_phone' => $request->manager_phone,
        ]);
        Alert::toast('تم إنشاء الشركة بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(Company $company)
    {
        return view('admin.pages.compnay.edit', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update([
            'name' => $request->name,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'address' => $request->address,
            'manager_name' => $request->manager_name,
            'manager_phone' => $request->manager_phone,
        ]);
        Alert::toast('تم تعديل الشركة بنجاح', 'success');
        return redirect(route('admin.company.index'));
    }

    public function destroy(CompanyDeleteRequest $request, Company $company)
    {
        $company->delete();
        Alert::toast('تم حذف الشركة بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $companies = $this->model::onlyTrashed()->paginate(20);
        return view('admin.pages.compnay.archive', compact('companies'));
    }

    public function trash(CompanyDeleteRequest $request)
    {

        $company = $this->model::withTrashed()->find($request->id);
        $company->forceDelete();
        Alert::toast('تم حذف الشركة نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(CompanyDeleteRequest $request)
    {
        $company = $this->model::withTrashed()->find($request->id);
        $company->restore();
        Alert::toast('تم استعادة الشركة', 'success');
        return redirect()->back();
    }
}
