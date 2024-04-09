@extends('admin.master')

@section('title')
      <title>Store Product Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف منتجات المخازن</h3>
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
                                                المخزن
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
                                                سعر الشراء
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                سعر الجملة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                سعر القطاعي
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                تاريخ الإنتهاء
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($storeProducts as $index => $storeProduct)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.storeProduct.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $storeProduct->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.storeProduct.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $storeProduct->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $storeProduct->id }}</td>

                                                @isset ($storeProduct->product)
                                                <td>
                                                      <a href="{{route('admin.product.show',$storeProduct->product)}}" >{{ $storeProduct->product->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد منتج</td>

                                                @endisset
                                                @isset ($storeProduct->store)
                                                <td>
                                                      <a href="{{route('admin.store.show',$storeProduct->store)}}" >{{ $storeProduct->store->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد مخزن</td>
                                                @endisset
                                                
                                                @isset ($storeProduct->unit)
                                                <td>
                                                      <a href="{{route('admin.unit.show',$storeProduct->unit)}}" >{{ $storeProduct->unit->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد مخزن</td>
                                                @endisset

                                                <td>{{ $storeProduct->count }}</td>

                                                <td>{{ $storeProduct->buy_price }}</td>
                                                <td>{{ $storeProduct->trade_price }}</td>
                                                <td>{{ $storeProduct->price }}</td>
                                                <td>{{ $storeProduct->expire_date }}</td>
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $storeProducts->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary">وحدات منتجات المخازن</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف وحدات منتجات المخازن</li>
                  </ol>
            </div>
      </div>
@endsection
