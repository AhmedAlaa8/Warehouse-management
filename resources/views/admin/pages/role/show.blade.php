{{-- @extends('admin.master') --}}

@section('title')
    <title>Role | Dashboard</title>
@endsection


@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title float-right">تفاصيل دور {{ $role->name }}</h3>
            </div>

            <div class="card-body d-right">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                        <div class="row">
                            {{-- <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                      <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">عدد الموردين</span>
                                                            <span class="info-box-number text-center text-muted mb-0">{{ $role->suppliers->count() }}</span>
                                                      </div>
                                                </div>
                                          </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="role">بيانات الدور</h4>
                                <div class="post">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>key</th>
                                                <th>value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>الاسم</td>
                                                <td>{{ $role->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>الإسم المعروض</td>
                                                <td>{{ $role->display_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>الوصف</td>
                                                <td>{{ $role->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row mt-5">
                            <div class="col-12">
                                <h4 class="supplier">الموردين من الشركة</h4>
                                <div class="post ">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>اسم الموَرِّد</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($company->suppliers as $index => $supplier)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $supplier->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('bread')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-primary"> الأدوار</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">جدول الأدوار</a></li>
                <li class="breadcrumb-item active">معلومات الدور</li>
            </ol>
        </div>
    </div>
@endsection
