@extends('admin.master')

@section('title')
      <title>Companies Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-company">
                        <h3 class="card-title float-right">جدول الشركات</h3>
                        <a href="{{ route('admin.company.create') }}" class="btn btn-success">إنشاء</a>
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
                                                رقم الهوية
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                اسم الشركة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                هاتف 1
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                هاتف 2
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                عنوان الشركة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                اسم مدير الشركة
                                          </th>
                                          <th>
                                                <input type="text" style="min-width:200px" />
                                                هاتف المدير
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
                                    @foreach ($companies as $index => $company)
                                          <tr>
                                                <td>{{ ++$index }}</td>
                                                <td>
                                                      <a href="{{route('admin.company.show',$company)}}" >{{ $company->id }}</a>
                                                </td>
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->phone1 }}</td>
                                                <td>{{ $company->phone2 }}</td>
                                                <td>{{ $company->address }}</td>
                                                <td>{{ $company->manager_name }}</td>
                                                <td>{{ $company->manager_phone }}</td>

                                                <td class="text-center">
                                                      <a class="btn btn-outline-info"  href="{{ route('admin.company.show', $company->id) }}">
                                                            <i class="far fa-eye"></i>
                                                      </a>
                                                </td>
                                                <td class="text-center">
                                                      <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.company.edit', $company->id) }}">
                                                            <i class="fas fa-pen"></i>
                                                      </a>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                      <form method="POST"
                                                            action="{{ route('admin.company.destroy', $company->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $company->id }}">
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
                        {{ $companies->links() }}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> الشركات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول الشركات</li>
                  </ol>
            </div>
      </div>
@endsection
