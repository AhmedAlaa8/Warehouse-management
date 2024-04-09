@extends('admin.master')

@section('title')
      <title>Store Products Table | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-storeProduct">
                        <h3 class="card-title float-right">جدول منتجات المخازن </h3>
                        <a href="{{ route('admin.storeProduct.create') }}" class="btn btn-success">إنشاء</a>
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
                                                المخزن
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الوحدة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الخصم
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
                                    @foreach ($storeProducts as $index => $storeProduct)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{route('admin.storeProduct.show',$storeProduct)}}" >{{ $storeProduct->id }}</a>
                                                </td>
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

                                                <td>{{ $storeProduct->discount }}</td>
                                                <td>{{ $storeProduct->count }}</td>

                                                <td>{{ $storeProduct->buy_price }}</td>
                                                <td>{{ $storeProduct->trade_price }}</td>
                                                <td>{{ $storeProduct->price }}</td>
                                                <td>{{ $storeProduct->expire_date }}</td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.storeProduct.show', $storeProduct) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.storeProduct.edit', $storeProduct) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.storeProduct.destroy', $storeProduct) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $storeProduct->id }}">
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
                        {{ $storeProducts->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> منتجات المخازن</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول منتجات المخازن</li>
                  </ol>
            </div>
      </div>
@endsection
