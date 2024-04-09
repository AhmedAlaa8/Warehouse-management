<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductUnit\ProductUnitDeleteRequest;
use App\Http\Requests\Admin\ProductUnit\ProductUnitStoreRequest;
use App\Http\Requests\Admin\ProductUnit\ProductUnitUpdateRequest;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\ProductUnitTrait;
use App\Http\Traits\UnitTrait;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductUnitController extends Controller
{
    use ProductUnitTrait,
    ProductTrait,
    UnitTrait;

    public $model;

    public function __construct(ProductUnit $productUnit)
    {
        $this->model = $productUnit;
    }

    public function index()
    {
        $productUnits = $this->getProductUnits(20);
        return view('admin.pages.productUnit.index', compact('productUnits'));
    }

    public function show(ProductUnit $productUnit)
    {
        return view('admin.pages.productUnit.show',compact('productUnit'));
    }

    public function create()
    {
        $products = $this->getProducts();
        $units = $this->getUnits();
        return view('admin.pages.productUnit.create',compact('products','units'));
    }

    public function store(ProductUnitStoreRequest $request)
    {
        $this->model::create([
            'product_id' => $request->product_id,
            'unit_id' => $request->unit_id,
            'count' => $request->count,
            'small_unit_id' => $request->small_unit_id,
        ]);
        Alert::toast('تم إنشاء وحدة المنتج بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(ProductUnit $productUnit)
    {
        $products = $this->getProducts();
        $units = $this->getUnits();
        return view('admin.pages.productUnit.edit',compact('productUnit','products','units'));
    }

    public function update(ProductUnitUpdateRequest $request, ProductUnit $productUnit)
    {
        $productUnit->update([
            'product_id' => $request->product_id,
            'unit_id' => $request->unit_id,
            'count' => $request->count,
            'small_unit_id' => $request->small_unit_id,
        ]);
        Alert::toast('تم تعديل وحدة المنتج بنجاح', 'success');
        return redirect(route('admin.productUnit.index'));
    }

    public function destroy(ProductUnitDeleteRequest $request,ProductUnit $productUnit)
    {
        $productUnit->delete();
        Alert::toast('تم حذف وحدة المنتج بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $productUnits = $this->getOnlyTrashedProductUnits(20);
        return view('admin.pages.productUnit.archive',compact('productUnits'));
    }

    public function trash(ProductUnitDeleteRequest $request)
    {
        $productUnit = $this->model::withTrashed()->find($request->id);
        $productUnit->forceDelete();
        Alert::toast('تم حذف وحدة المنتج نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(ProductUnitDeleteRequest $request)
    {
        $productUnit = $this->model::withTrashed()->find($request->id);
        $productUnit->restore();
        Alert::toast('تم استعادة وحدة المنتج', 'success');
        return redirect()->back();
    }
}
