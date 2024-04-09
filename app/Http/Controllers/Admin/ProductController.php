<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductDeleteRequest;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Http\Traits\CategoryTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\StoreTrait;
use App\Http\Traits\SupplierTrait;
use App\Http\Traits\UnitTrait;
use App\Models\Product;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    use CategoryTrait,
        SupplierTrait,
        ProductTrait,
        StoreTrait,
        UnitTrait;


    public $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function index(ProductsDataTable $productsDataTable)
    {
        return $productsDataTable->render('admin.pages.product.index');
        // $products = $this->getProducts(20);
        // return view('admin.pages.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();
        $stores = $this->getStores();
        $units = $this->getUnits();
        return view('admin.pages.product.show', compact('product','stores','units','categories','suppliers'));
    }

    public function create()
    {
        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();
        $stores = $this->getStores();
        $units = $this->getUnits();
        return view('admin.pages.product.create', compact('categories', 'suppliers', 'stores', 'units'));
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'published' => $request->published ?? 0,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
        ]);

        StoreProduct::create([
            'product_id' => $product->id,
            'unit_id' => $request->unit_id,
            'store_id' => $request->store_id,
            'count' => $request->count,
            'buy_price' => $request->buy_price,
            'trade_price' => $request->trade_price,
            'price' => $request->price,
            'discount' => $request->discount,
            'expire_date' => $request->expire_date,
        ]);

        Alert::toast('تم إنشاء المنتج بنجاح', 'success');
        return redirect()->back()->withInput($request->except(['name','buy_price','trade_price','price','expire_date','count','discount']));
    }

    public function edit(Product $product)
    {
        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();
        return view('admin.pages.product.edit', compact('product', 'suppliers', 'categories'));
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'published' => $request->published ?? 0,
            'desc' => $request->desc,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
        ]);
        Alert::toast('تم تعديل المنتج بنجاح', 'success');
        return redirect(route('admin.product.index'));
    }

    public function updateCategory(Request $request, Product $product)
    {
        $product->update([

            'category_id' => $request->category_id,

        ]);

        Alert::toast('تم تعديل المنتج بنجاح', 'success');
        return redirect()->back();
    }
    public function updatesupplier(Request $request, Product $product)
    {
        $product->update([

            'supplier_id' => $request->supplier_id,

        ]);

        Alert::toast('تم تعديل المنتج بنجاح', 'success');
        return redirect()->back();
    }
    public function destroy(ProductDeleteRequest $request, Product $product)
    {
        $product->delete();
        Alert::toast('تم حذف المنتج بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $products = $this->getOnlyTrashedProducts(20);
        return view('admin.pages.product.archive', compact('products'));
    }

    public function trash(ProductDeleteRequest $request)
    {
        $product = $this->model::withTrashed()->find($request->id);
        $product->forceDelete();
        Alert::toast('تم حذف المنتج نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(ProductDeleteRequest $request)
    {
        $product = $this->model::withTrashed()->find($request->id);
        $product->restore();
        Alert::toast('تم استعادة المنتج', 'success');
        return redirect()->back();
    }

    public function changePublishStatus(Product $product)
    {
        $product->update([
            'published' => ! $product->published
        ]);
        return response()->json([
            'published' => $product->published
        ]);
    }
}
