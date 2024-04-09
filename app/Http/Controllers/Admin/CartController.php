<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cart\CartDeleteRequest;
use App\Http\Requests\Admin\Cart\CartStoreRequest;
use App\Http\Requests\Admin\Cart\CartUpdateRequest;
use App\Http\Traits\CartTrait;
use App\Http\Traits\StoreProductTrait;
use App\Http\Traits\UserTrait;
use App\Models\Cart;
use App\Models\StoreProduct;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    use CartTrait,
    StoreProductTrait,
    UserTrait;

    public $cartModel;

    public function __construct(Cart $cart)
    {
        $this->cartModel = $cart;
    }

    public function index()
    {
        $carts = $this->getCarts(20);
        return view('admin.pages.cart.index', compact('carts'));
    }

    public function show(Cart $cart)
    {
        return view('admin.pages.cart.show',compact('cart'));
    }

    public function create()
    {
        $storeProducts = $this->getStoreProducts();
        $users = $this->getUsersAndSuppliers();
        // dd($users);
        return view('admin.pages.cart.create',compact('storeProducts','users'));
    }

    public function store(CartStoreRequest $request)
    { 
        // $storeProduct = StoreProduct::find($request->store_product_id);
        // $this->cartModel::create([
        //     'store_product_id' => $request->store_product_id,
        //     'discount' => $storeProduct->discount,
        //     'product_buy_price' => $storeProduct->buy_price,
        //     'user_id' => $request->user_id,
        //     'count' => $request->count,
        //     'price' => $request->price,
        //     'total_price' => $request->total_price,
        // ]);
        // Alert::toast('تم إنشاء  سلة التسوق بنجاح', 'success');
        // return redirect()->back()->withInput();
    }

    public function edit(Cart $cart)
    {
        $storeProducts = $this->getStoreProducts();
        $users = $this->getUsers();
        return view('admin.pages.cart.edit',compact('cart','storeProducts','users'));
    }

    public function update(CartUpdateRequest $request, Cart $cart)
    {
        $cart->update([
            'store_product_id' => $request->store_product_id,
            'user_id' => $request->user_id,
            'count' => $request->count,
            'price' => $request->price,
            'total_price' => $request->total_price,
        ]);
        Alert::toast('تم تعديل سلة التسوق بنجاح', 'success');
        return redirect(route('admin.cart.index'));
    }

    public function destroy(CartDeleteRequest $request,Cart $cart)
    {
        $cart->delete();
        Alert::toast('تم حذف سلة التسوق بنجاح', 'success');
        return redirect()->back();
    }

    public function archive()
    {
        $carts = $this->getOnlyTrashedCarts(20);
        return view('admin.pages.cart.archive',compact('carts'));
    }

    public function trash(CartDeleteRequest $request)
    {
        $cart = $this->cartModel::withTrashed()->find($request->id);
        $cart->forceDelete();
        Alert::toast('تم حذف سلة التسوق نهائيا', 'success');
        return redirect()->back();
    }

    public function restore(CartDeleteRequest $request)
    {
        $cart = $this->cartModel::withTrashed()->find($request->id);
        $cart->restore();
        Alert::toast('تم سلة التسوق المنتج', 'success');
        return redirect()->back();
    }

    public function ajaxStoreCart(CartStoreRequest $request)
    {
        $cartablesArray = $this->getCartablesFromSelect($request->userId);
        $data = [];
        foreach($request->storeProducts as $index => $storeProductId)
        {
            $cartItemExists = $cartablesArray['query']->where([
                ['store_product_id', $storeProductId]
            ]);
            if($cartItemExists->exists())
            {
                $cartItem = $cartItemExists->first();
                $cartItem->update([
                    'count' => $cartItem->count + $request->counts[$index],
                    'total_price' => $cartItem->total_price + $request->total_prices[$index]
                ]);
            }
            else
            {
                $storeProduct = StoreProduct::find($storeProductId);
                if($storeProduct)
                {
                    $data []= [
                        'store_product_id' => $storeProductId,
                        'cartable_id' => $cartablesArray['cartableModel']->id,
                        'cartable_type' => $cartablesArray['cartableModel']::class,
                        'discount' => $request->discounts[$index],
                        'product_buy_price' => $storeProduct->buy_price,
                        'count' => $request->counts[$index],
                        'price' => $request->prices[$index],
                        'total_price' => $request->total_prices[$index],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        Cart::insert($data);

        return 1;
    }
}
