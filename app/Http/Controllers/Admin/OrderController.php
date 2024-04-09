<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\CreateOrderPager;
use App\Http\Traits\CartTrait;
use App\Http\Traits\OrderTrait;
use App\Http\Traits\UserTrait;
use App\Models\Cart;
use App\Models\Order;
use App\Models\StoreProduct;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    use UserTrait;
    use CartTrait;
    use OrderTrait;

    private $cartModel;
    private $orderService;

    public function __construct(Cart $cart,OrderService $orderService)
    {
        $this->cartModel = $cart;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->getOrders(20);
        return view('admin.pages.order.index', compact('orders'));
    }

    public function createOrderPage(Request $request)
    {
        $users = $this->getUsersWhoHasCarts();
        if (request()->has('createOrder'))
        {
            return redirect(route('admin.order.createOrder', $request->all()));
        }
        if (request('user_id'))
        {
            $cartablesArray = $this->getCartablesFromSelect($request->user_id);
            $userCart = $cartablesArray['query']->get();
            $cartTotal = $this->getSumOfTotalOfCarts($userCart);
            $cartTotalDiscount = $this->getSumOfTotalOfDiscount($userCart);
            return view('admin.pages.order.createOrderPage', compact('users', 'userCart', 'cartTotal','cartTotalDiscount'));
        }
        return view('admin.pages.order.createOrderPage', compact('users'));
    }

    public function createOrder(CreateOrderPager $request)
    {
        DB::transaction(function () use ($request) {
            $this->orderService->run([
                'type' => $request->order_type,
                'data' => $request->all()
            ]);
        });

        Alert::toast('تم عمل الاوردر', 'success');
        return redirect(route('admin.cart.create'));
    }
}
