<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\StoreDeleteRequest;
use App\Http\Requests\Admin\Store\StoreStoreRequest;
use App\Http\Requests\Admin\Store\StoreUpdateRequest;
use App\Http\Traits\StoreTrait;
use App\Models\Store;
use RealRashid\SweetAlert\Facades\Alert;

class StoreController extends Controller
{
    use StoreTrait;

    public $model;

    public function __construct(Store $store)
    {
        // $this->middleware('permission:c-store')->only(['store','create']);
        // $this->middleware('permission:u-store')->only(['edit','update']);
        // $this->middleware('permission:r-store')->only(['index','show']);
        // $this->middleware('permission:d-store')->only(['destroy','archive','trash','restore']);
        $this->model = $store;
    }

    public function index()
    {
        $stores = $this->getStores(20);
        return view('admin.pages.store.index', compact('stores'));
    }

    public function show(Store $store)
    {
        return view('admin.pages.store.show',compact('store'));
    }

    public function create()
    {
        return view('admin.pages.store.create');
    }

    public function store(StoreStoreRequest $request)
    {
        $this->model::create([
            'name' => $request->name,
            'address' => $request->address,
            'type' => $request->type,
        ]);
        Alert::toast('تم إنشاء المخزن بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(Store $store)
    {
        return view('admin.pages.store.edit',compact('store'));
    }

    public function update(StoreUpdateRequest $request, Store $store)
    {
        $store->update([
            'name' => $request->name,
            'address' => $request->address,
            'type' => $request->type,
        ]);
        Alert::toast('تم تعديل المخزن بنجاح', 'success');
        return redirect(route('admin.store.index'));
    }

    public function destroy(StoreDeleteRequest $request,Store $store)
    {
        $store->delete();
        Alert::toast('تم حذف المخزن بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $stores = $this->model::onlyTrashed()->paginate(20);
        return view('admin.pages.store.archive',compact('stores'));
    }

    public function trash(StoreDeleteRequest $request)
    {
        $store = $this->model::withTrashed()->find($request->id);
        $store->forceDelete();
        Alert::toast('تم حذف المخزن نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(StoreDeleteRequest $request)
    {
        $store = $this->model::withTrashed()->find($request->id);
        $store->restore();
        Alert::toast('تم استعادة المخزن', 'success');
        return redirect()->back();
    }
}
