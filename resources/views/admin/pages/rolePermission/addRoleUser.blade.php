@extends('admin.master')

@section('title')
      <title>Add Role To User | Dashboard</title>
@endsection


@section('css')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-roleUser">
                        <h3 class="card-title float-right">اعطاء دور لمستخدم</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.permission.addRoleUser') }}">
                        @csrf

                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="role_id" class="col-sm-2 col-form-label">اسم الدور</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible role_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="role_id" id="role_id">
                                                <option>اختر</option>
                                                @foreach ($roles as $item)
                                                      <option value="{{ $item->id }}"
                                                            {{ old('role_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('role_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="user_id" class="col-sm-2 col-form-label">اسم المستخدم</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible user_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="user_id" id="user_id">
                                                <option>اختر</option>
                                                @foreach ($users as $item)
                                                      <option value="{{ $item->id }}"
                                                            {{ old('user_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('user_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>
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
                  <h1 class="m-0 text-primary">صلاحيات الأدوار</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">جدول صلاحيات الأدوار</li>
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