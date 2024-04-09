@extends('admin.master')

@section('title')
      <title>Product Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف المنتجات</h3>
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
                                                slug
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                حالة النشر
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                الوصف 
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                التصنيف 
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                المورد 
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($products as $index => $product)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.product.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.product.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->slug }}</td>
                                                @if ($product->published)
                                                <td class="bg-success">ظاهر</td>
                                                @else
                                                <td class="bg-warning">مخفي</td>
                                                @endif
                                                
                                                <td>{!! $product->desc !!}</td>

                                                @isset($product->category->name)
                                                <td>{{ $product->category->name}}</td>
                                                @else
                                                <td class="text-danger">لا يوجد تصنيف</td>
                                                @endisset

                                                @isset($product->supplier->name)
                                                <td>{{ $product->supplier->name}}</td>
                                                @else
                                                <td class="text-danger">لا يوجد مورد</td>
                                                @endisset
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $products->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary">المنتجات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف المنتجات</li>
                  </ol>
            </div>
      </div>
@endsection
