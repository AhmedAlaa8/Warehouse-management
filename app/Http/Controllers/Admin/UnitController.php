<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\UnitDeleteRequest;
use App\Http\Requests\Admin\Unit\UnitStoreRequest;
use App\Http\Requests\Admin\Unit\UnitUpdateRequest;
use App\Http\Traits\UnitTrait;
use App\Models\Unit;
use RealRashid\SweetAlert\Facades\Alert;

class UnitController extends Controller
{
    use UnitTrait;

    public $model;

    public function __construct(Unit $unit)
    {
        $this->model = $unit;
    }

    public function index()
    {
        $units = $this->getUnits(20);
        return view('admin.pages.unit.index', compact('units'));
    }

    public function show(Unit $unit)
    {
        return view('admin.pages.unit.show',compact('unit'));
    }

    public function create()
    {
        return view('admin.pages.unit.create');
    }

    public function store(UnitStoreRequest $request)
    {
        $this->model::create([
            'name' => $request->name,
        ]);
        Alert::toast('تم إنشاء الوحدة بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(Unit $unit)
    {
        return view('admin.pages.unit.edit',compact('unit'));
    }

    public function update(UnitUpdateRequest $request, Unit $unit)
    {
        $unit->update([
            'name' => $request->name,
        ]);
        Alert::toast('تم تعديل الوحدة بنجاح', 'success');
        return redirect(route('admin.unit.index'));
    }

    public function destroy(UnitDeleteRequest $request,Unit $unit)
    {
        $unit->delete();
        Alert::toast('تم حذف الوحدة بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $units = $this->model::onlyTrashed()->paginate(20);
        return view('admin.pages.unit.archive',compact('units'));
    }

    public function trash(UnitDeleteRequest $request)
    {
        $unit = $this->model::withTrashed()->find($request->id);
        $unit->forceDelete();
        Alert::toast('تم حذف الوحدة نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(UnitDeleteRequest $request)
    {
        $unit = $this->model::withTrashed()->find($request->id);
        $unit->restore();
        Alert::toast('تم استعادة الوحدة', 'success');
        return redirect()->back();
    }
}
