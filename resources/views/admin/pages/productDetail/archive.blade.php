@extends('admin.master')

@section('title')
      <title>Product Detail Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف تفاصيل المنتجات</h3>
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
                                                الخاصية
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                القيمة
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($productDetails as $index => $productDetail)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.productDetail.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $productDetail->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.productDetail.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $productDetail->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $productDetail->id }}</td>

                                                @isset ($productDetail->product)
                                                <td>
                                                      <a href="{{route('admin.product.show',$productDetail->product)}}" >{{ $productDetail->product->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد منتج</td>
                                                @endisset

                                                <td>{{ $productDetail->key }}</td>
                                                <td>{{ $productDetail->value }}</td>
                                               
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $productDetails->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary">تفاصيل المنتجات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف تفاصيل المنتجات</li>
                  </ol>
            </div>
      </div>
@endsection
