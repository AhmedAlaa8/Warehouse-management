@extends('admin.master')

@section('title')
      <title>Supplier Profile | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-info">
                        <h3 class="card-title float-right">تفاصيل مورد {{$supplier->name}}</h3>
                  </div>

                  <div class="card-body d-right">
                        <div class="row">
                              <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                    <div class="row">
                                          <div class="col-12 col-sm-4">
                                                <div class="info-box bg-light">
                                                      <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">عدد الموردين</span>
                                                            <span class="info-box-number text-center text-muted mb-0">10</span>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-12">
                                                <div class="d-flex justify-content-between mb-3">
                                                      <h4 class="user">بيانات المورد</h4>
                                                      <a href="{{route('admin.userProfile.create',$supplier)}}" class="btn btn-info">تعديل بيانات المورد</a>
                                                </div>
                                                <div class="post">
                                                     @include('admin.pages.userProfile.infoTable',[
                                                      'model' => $supplier
                                                     ])
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
                  <h1 class="m-0 text-primary"> الموردين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">جدول الموردين</a></li>
                        <li class="breadcrumb-item active">معلومات المورد</li>
                  </ol>
            </div>
      </div>
@endsection
