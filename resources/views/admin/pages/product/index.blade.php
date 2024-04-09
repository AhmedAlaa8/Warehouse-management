@extends('admin.master')

@section('title')
      <title>Products Table | Dashboard</title>
      <link rel="stylesheet" href="{{asset('adminLTE/assets/css/jquery.dataTables.min.css')}}">
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-product">
                        <h3 class="card-title float-right">جدول المنتجات</h3>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-success">إنشاء</a>
                  </div>

                  <div class="card-body">`
                        {!! $dataTable->table([
                              "class" => "table"
                        ],true) !!}
                  </div>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> المنتجات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول المنتجات</li>
                  </ol>
            </div>
      </div>
@endsection


@section('javascript')
      <script src="{{asset('adminLTE/assets/js/jquery.dataTables.min.js')}}"></script>
      <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
      <script src="/vendor/datatables/buttons.server-side.js"></script>
      {!! $dataTable->scripts() !!}
@endsection
