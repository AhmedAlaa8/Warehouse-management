@extends('admin.master')

@section('title')
      <title>Edit Store | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warning">
                        <h3 class="card-title float-right">تعديل مخزن</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.store.update',$store->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <x-form.text name="name" label="الإسم"  :value="$store->name" />
                            <x-form.text name="address" label="العنوان" :value="$store->address" />

                            <x-form.select-array name="type" :array="getStoreTypes()" label="اختر المخزن" :selected="$store->type"/>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                              <button type="submit" class="btn btn-info">تعديل</button>
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
                        <li class="breadcrumb-item active">تعديل مخزن</li>
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
