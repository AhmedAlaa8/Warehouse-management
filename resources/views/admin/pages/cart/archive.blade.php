@extends('admin.master')

@section('title')
      <title>Cart Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف عربة التسوق</h3>
                  </div>

                  <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                          <th>
                                                استعادة
                                          </th>
                                          <th>
                                                حذف تماما
                                          </th>
                                          <th>
                                                التسلسل
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" id="exact" />
                                                رقم الهوية
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
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($carts as $index => $cart)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.cart.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $cart->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.cart.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $cart->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $cart->id }}</td>

                                                @isset ($cart->storeProduct)
                                                <td>
                                                      <a href="{{route('admin.storeProduct.show',$cart->storeProduct)}}" >{{ $cart->storeProduct->product->name }}</a>
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
                  <h1 class="m-0 text-primary">عربات التسوق</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف عربات التسوق</li>
                  </ol>
            </div>
      </div>
@endsection
