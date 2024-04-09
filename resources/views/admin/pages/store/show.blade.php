@extends('admin.master')

@section('title')
      <title>Store | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-info">
                        <h3 class="card-title float-right">تفاصيل مخزن {{$store->name}}</h3>
                  </div>

                  <div class="card-body d-right">
                        <div class="row">
                              <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                    <div class="row">
                                          <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                      {{-- <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">عدد الموردين</span>
                                                            <span class="info-box-number text-center text-muted mb-0">{{ $company->suppliers->count() }}</span>
                                                      </div> --}}
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-12">
                                                <h4 class="store">بيانات المخزن</h4>
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
                                                                        <td>{{ $store->name }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>العنوان</td>
                                                                        <td>{{ $store->address }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                        <td>النوع</td>
                                                                        <td style="background-color: {{getStoreTypes()[$store->type]['color']}}">{{ getStoreTypes()[$store->type]['ar'] }}</td>
                                                                  </tr>
                                                            </tbody>
                                                      </table>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> المخازن</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.store.index') }}">جدول المخازن</a></li>
                        <li class="breadcrumb-item active">معلومات المخزن</li>
                  </ol>
            </div>
      </div>
@endsection
