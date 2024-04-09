@extends('admin.master')

@section('title')
      <title>Create Store | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء مخزن جديد</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.store.store') }}">
                        @csrf
                        <div class="card-body">
                            <x-form.text name="name" label="الإسم" :value="old('name')" />
                            <x-form.text name="address" label="العنوان" :value="old('address')" />

                            <x-form.select-array name="type" :array="getStoreTypes()" label="اختر المخزن" :selected="old('type')" />


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                              <button type="submit" class="btn btn-info">إنشاء</button>
                        </div>
                        <!-- /.card-footer -->
                  </form>
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
                        <li class="breadcrumb-item active">إنشاء مخزن</li>
                  </ol>
            </div>
      </div>
@endsection



@section('javascript')
      <script>
            $(document).ready(function() {
                  $('.select2').select2()
            });
      </script>
@endsection
