@extends('admin.master')

@section('title')
      <title>Companies Archive | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-danger">
                        <h3 class="card-title float-right">أرشيف الشركات</h3>
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
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($companies as $index => $company)
                                          <tr>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.company.restore') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $company->id }}">
                                                            <button type="submit" class="btn btn-info ml-2">
                                                                  <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>
                                                      <form method="POST"
                                                            action="{{ route('admin.company.trash') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $company->id }}">
                                                            <button type="submit" class="btn btn-danger ml-2">
                                                                  <i class="fas fa-trash"></i>
                                                            </button>
                                                      </form>
                                                </td>
                                                <td>{{ ++$index }}</td>
                                                <td>{{ $company->id }}</td>
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->phone1 }}</td>
                                                <td>{{ $company->phone2 }}</td>
                                                <td>{{ $company->address }}</td>
                                                <td>{{ $company->manager_name }}</td>
                                                <td>{{ $company->manager_phone }}</td>
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
                        <li class="breadcrumb-item active">أرشيف الشركات</li>
                  </ol>
            </div>
      </div>
@endsection
