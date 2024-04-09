@extends('admin.master')

@section('title')
      <title>Product Unit Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف وحدة المنتجات</h3>
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
                                                الوحدة الكبيرة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الكمية
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الوحدة الصغيرة
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($productUnits as $index => $productUnit)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.productUnit.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $productUnit->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.productUnit.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $productUnit->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $productUnit->id }}</td>

                                                @isset ($productUnit->product)
                                                <td>
                                                      <a href="{{route('admin.product.show',$productUnit->product)}}" >{{ $productUnit->product->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد منتج</td>
                                                @endisset

                                                @isset ($productUnit->unit)
                                                <td>
                                                      <a href="{{route('admin.unit.show',$productUnit->unit)}}" >{{ $productUnit->unit->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد وحدة كبيرة</td>
                                                @endisset
                                                
                                                <td>{{ $productUnit->count }}</td>

                                                @isset ($productUnit->smallUnit)
                                                <td>
                                                      <a href="{{route('admin.unit.show',$productUnit->smallUnit)}}" >{{ $productUnit->smallUnit->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا يوجد وحدة صغيرة</td>
                                                @endisset
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $productUnits->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary">وحدات المنتجات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف وحدات المنتجات</li>
                  </ol>
            </div>
      </div>
@endsection
