@extends('admin.master')

@section('title')
      <title>Create Category | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء تصنيف جديد</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="card-body">
                            <x-form.text name="name" label="الإسم" :value="old('name')" />
                            <x-form.select-object name="parent_id" label=" الأب" :collection="$categories" field="name"
                            :selected="old('parent_id')" />

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
                  <h1 class="m-0 text-primary"> التصنيفات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">جدول التصنيفات</a></li>
                        <li class="breadcrumb-item active">إنشاء تصنيف</li>
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
