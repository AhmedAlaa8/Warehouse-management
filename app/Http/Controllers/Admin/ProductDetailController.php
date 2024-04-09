<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductDetail\ProductDetailCreateRequest;
use App\Http\Requests\Admin\ProductDetail\ProductDetailDeleteRequest;
use App\Http\Requests\Admin\ProductDetail\ProductDetailUpdateRequest;
use App\Http\Traits\ProductDetailTrait;
use App\Http\Traits\ProductTrait;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductDetailController extends Controller
{
    use ProductTrait,
        ProductDetailTrait;

    public $productDetailModel;

    public function __construct(ProductDetail $productDetail)
    {
        $this->productDetailModel = $productDetail;
    }

    public function index()
    {
        $productDetails = $this->getProductDetail(20);
        return view('admin.pages.productDetail.index', compact('productDetails'));
    }

    public function show(ProductDetail $productDetail)
    {
        return view('admin.pages.productDetail.show',compact('productDetail'));
    }

    public function create()
    {
        $products = $this->getProducts();
        return view('admin.pages.productDetail.create',compact('products'));
    }

    public function store(ProductDetailCreateRequest $request)
    {
        $this->productDetailModel::create([
            'product_id' => $request->product_id,
            'key' => $request->key,
            'value' => $request->value,
        ]);
        Alert::toast('تم انشاء تفصيل المنتج بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(ProductDetail $productDetail)
    {
        $products = $this->getProducts();
        return view('admin.pages.productDetail.edit',compact('productDetail','products'));
    }

    public function update(ProductDetailUpdateRequest $request, ProductDetail $productDetail)
    {
        $productDetail->update([
            'product_id' => $request->product_id,
            'key' => $request->key,
            'value' => $request->value,
        ]);
        Alert::toast('تم تعديل تفصيل المنتج بنجاح', 'success');
        return redirect(route('admin.productDetail.index'));
    }

    public function destroy(ProductDetailDeleteRequest $request,ProductDetail $productDetail)
    {
        $productDetail->delete();
        Alert::toast('تم حذف تفصيل المنتج بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $productDetails = $this->getOnlyTrashedProductDetail(20);
        return view('admin.pages.productDetail.archive',compact('productDetails'));
    }

    public function trash(ProductDetailDeleteRequest $request)
    {
        $productDetail = $this->productDetailModel::withTrashed()->find($request->id);
        $productDetail->forceDelete();
        Alert::toast('تم حذف تفصيل المنتج نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(ProductDetailDeleteRequest $request)
    {
        $productDetail = $this->productDetailModel::withTrashed()->find($request->id);
        $productDetail->restore();
        Alert::toast('تم استعادة تفصيل المنتج', 'success');
        return redirect()->back();
    }
}
