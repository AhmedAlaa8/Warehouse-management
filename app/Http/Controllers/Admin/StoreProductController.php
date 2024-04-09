<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProduct\StoreProductCreateRequest;
use App\Http\Requests\Admin\StoreProduct\StoreProductDeleteRequest;
use App\Http\Requests\Admin\StoreProduct\StoreProductUpdateRequest;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\StoreProductTrait;
use App\Http\Traits\StoreTrait;
use App\Http\Traits\UnitTrait;
use App\Models\StoreProduct;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StoreProductController extends Controller
{
    use StoreProductTrait,
        UnitTrait,
        StoreTrait,
        ProductTrait;

    public $storeProductModel;

    public function __construct(StoreProduct $storeProduct)
    {
        $this->storeProductModel = $storeProduct;
    }

    public function index()
    {
        $storeProducts = $this->getStoreProducts(20);
        return view('admin.pages.storeProduct.index', compact('storeProducts'));
    }

    public function show(StoreProduct $storeProduct)
    {
        return view('admin.pages.storeProduct.show',compact('storeProduct'));
    }

    public function create()
    {
        $products = $this->getProducts();
        $units = $this->getUnits();
        $stores = $this->getStores();
        return view('admin.pages.storeProduct.create',compact('products','units','stores'));
    }

    public function store(StoreProductCreateRequest $request)
    {
        $this->storeProductModel::create([
            'product_id' => $request->product_id,
            'unit_id' => $request->unit_id,
            'store_id' => $request->store_id,
            'count' => $request->count,
            'discount' => $request->discount,
            'buy_price' => $request->buy_price,
            'trade_price' => $request->trade_price,
            'price' => $request->price,
            'expire_date' => $request->expire_date,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back()->withInput();
    }

    public function edit(StoreProduct $storeProduct)
    {
        $products = $this->getProducts();
        $units = $this->getUnits();
        $stores = $this->getStores();
        return view('admin.pages.storeProduct.edit',compact('storeProduct','products','units','stores'));
    }

    public function update(StoreProductUpdateRequest $request, StoreProduct $storeProduct)
    {
        $storeProduct->update([
            'product_id' => $request->product_id,
            'unit_id' => $request->unit_id,
            'store_id' => $request->store_id,
            'count' => $request->count,
            'discount' => $request->discount,
            'buy_price' => $request->buy_price,
            'trade_price' => $request->trade_price,
            'price' => $request->price,
            'expire_date' => $request->expire_date,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function destroy(StoreProductDeleteRequest $request,StoreProduct $storeProduct)
    {
        $storeProduct->delete();
        Alert::toast('تم حذف وحدة المنتج بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $storeProducts = $this->getOnlyTrashedStoreProducts(20);
        return view('admin.pages.storeProduct.archive',compact('storeProducts'));
    }

    public function trash(StoreProductDeleteRequest $request)
    {
        $storeProduct = $this->storeProductModel::withTrashed()->find($request->id);
        $storeProduct->forceDelete();
        Alert::toast('تم حذف وحدة المنتج نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(StoreProductDeleteRequest $request)
    {
        $storeProduct = $this->storeProductModel::withTrashed()->find($request->id);
        $storeProduct->restore();
        Alert::toast('تم استعادة وحدة المنتج', 'success');
        return redirect()->back();
    }

    public function ajaxGetStoreProductById(Request $request)
    {
        $storeProduct = StoreProduct::find($request->id);
        $userType = explode("-",$request->user_id);
        $userType = end($userType);

        $data = [
            'price' => $storeProduct->price,
            'discount' => $storeProduct->discount,
        ];

        if($request->order_type == "sell" && $userType == "مورد")
        {
            $data['price'] = $storeProduct->trade_price;
        }
        else if($request->order_type == "buy" && $userType == "مورد")
        {
            $data['price'] = $storeProduct->buy_price;
        }
        else
        {
            $data['price'] = $storeProduct->price;
        }

        return response()->json($data);
    }

    public function ajaxHandleChangeOfOrderType(Request $request)
    {
        $storeProducts = StoreProduct::find($request->store_products);
        $userType = explode("-",$request->user_id);
        $userType = end($userType);

        $data = [];
        foreach($storeProducts as $storeProduct)
        {
            if($request->order_type == "sell" && $userType == "مورد")
            {
                $data[] = [
                    'price' => $storeProduct->trade_price,
                    'discount' => $storeProduct->discount,
                ];
            }
            else if($request->order_type == "buy" && $userType == "مورد")
            {
                $data[] = [
                    'price' => $storeProduct->buy_price,
                    'discount' => $storeProduct->discount,
                ];
            }
            else
            {
                $data[] = [
                    'price' => $storeProduct->price,
                    'discount' => $storeProduct->discount,
                ];
            }
        }
        return response()->json($data);
    }
}
