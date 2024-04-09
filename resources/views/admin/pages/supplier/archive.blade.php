@extends('admin.master')

@section('title')
      <title>Suppliers Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف الموردين</h3>
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
                                                اسم المورد
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                اسم شركة المورد
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                البريد
                                          </th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($suppliers as $index => $supplier)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.supplier.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $supplier->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.supplier.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $supplier->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $supplier->id }}</td>
                                                <td>{{ $supplier->name }}</td>
                                                @isset($supplier->company)
                                                <td>
                                                      <a href="{{route('admin.company.show',$supplier->company)}}" >{{ $supplier->company->name }}</a>
                                                </td>
                                                @else
                                                      <td class="text-danger">لا توجد شركة</td>
                                                @endisset
                                                <td>{{ $supplier->email }}</td>
                                          </tr>
                                    @endforeach

                              </tbody>
                        </table>
                  </div>
                  <div class="card-footer">
                        {{ $suppliers->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> الموردين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أرشيف الموردين</li>
                  </ol>
            </div>
      </div>
@endsection
