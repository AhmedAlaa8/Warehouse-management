@extends('admin.master')

@section('title')
      <title>Cart Table | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-cart">
                        <h3 class="card-title float-right">جدول عربة التسوق</h3>
                        <a href="{{ route('admin.cart.create') }}" class="btn btn-success">إنشاء</a>
                  </div>

                  <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                          <th>
                                                التسلسل
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" id="exact" />
                                                <p>رقم الهوية</p>
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                اسم المنتج
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الوحدة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الكمية
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                سعر القطعلة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                السعر الكلي
                                          </th>
                                          <th>
                                                تفاصيل
                                          </th>
                                          <th>
                                                تعديل
                                          </th>
                                          <th>
                                                حذف
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($carts as $index => $cart)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                
                                                <td>
                                                      <a href="{{route('admin.cart.show',$cart)}}" >{{ $cart->id }}</a>
                                                </td>

                                                @isset ($cart->storeProduct->product)
                                                <td>
                                                      <a href="{{route('admin.product.show',$cart->storeProduct->product)}}" >{{ $cart->storeProduct->product->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد منتج</td>
                                                @endisset

                                                @isset ($cart->storeProduct->unit)
                                                <td>
                                                      <a href="{{route('admin.unit.show',$cart->storeProduct->unit)}}" >{{ $cart->storeProduct->unit->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد وحدة</td>
                                                @endisset
                                                
                                                <td>{{ $cart->count }}</td>
                                                <td>{{ $cart->price }}</td>
                                                <td>{{ $cart->total_price }}</td>

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.cart.show', $cart) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.cart.edit', $cart) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.cart.destroy', $cart) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $cart->id }}">
                                                            <button type="submit" class="btn btn-outline-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>    
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $carts->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary">عربة التسوق</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول عربة التسوق</li>
                  </ol>
            </div>
      </div>
@endsection
