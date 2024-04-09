@extends('admin.master')

@section('title')
      <title>Suppliers Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-supplier">
                        <h3 class="card-title float-right">جدول الموردين</h3>
                        <a href="{{ route('admin.supplier.create') }}" class="btn btn-success">إنشاء</a>
                  </div>

                  <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                          <th>
                                                التسلسل
                                          </th>
                                          <th>
                                                <input type="text" style="max-width:100px" id="exact" />
                                                رقم الهوية
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                اسم الموَرِّد
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                اسم شركة الموَرِّد
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                البريد الإلكتروني
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
                                    @foreach ($suppliers as $index => $supplier)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{route('admin.supplier.show',$supplier->id)}}">
                                                            {{ $supplier->id }}
                                                      </a>
                                                </td>
                                                <td>{{ $supplier->name }}</td>
                                                
                                                @isset($supplier->company)
                                                <td>
                                                      <a href="{{route('admin.company.show',$supplier->company)}}" >{{ $supplier->company->name }}</a>
                                                </td>
                                                @else
                                                <td class="text-danger">لا توجد شركة</td>
                                                @endisset
                                                
                                                <td>{{ $supplier->email }}</td>

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.supplier.show', $supplier) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.supplier.edit', $supplier) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                               
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.supplier.destroy', $supplier) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $supplier->id }}">
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
                        <li class="breadcrumb-item active">جدول الموردين</li>
                  </ol>
            </div>
      </div>
@endsection
