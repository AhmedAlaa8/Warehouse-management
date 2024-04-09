@extends('admin.master')

@section('title')
      <title>Category Tree Table | Dashboard</title>
@endsection


@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-category">
                        <h3 class="card-title float-right">التصنيفات شكل شجري</h3>
                  </div>
                  <!-- ./card-header -->
                  <div class="card-body p-0 d-left">
                        <div class="container">
                              @include('admin.pages.category.treeElement')                              
                        </div>
                  </div>
                  <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary"> التصنيفات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">جدول التصنيفات</a></li>
                        <li class="breadcrumb-item active"> التصنيفات شكل شجري</li>
                  </ol>
            </div>
      </div>
@endsection
