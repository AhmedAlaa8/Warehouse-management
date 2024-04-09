@extends('admin.master')

@section('title')
      <title>Edit Role | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warning">
                        <h3 class="card-title float-right">تعديل دور</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.role.update',$role) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">الإسم</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" id="name" value="{{$role->name}}">
                                          @foreach ($errors->get('name') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="display_name" class="col-sm-2 col-form-label">الإسم المعروض</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('display_name') {{ 'is-invalid' }} @enderror" name="display_name" id="display_name" value="{{$role->display_name}}">
                                          @foreach ($errors->get('display_name') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="published" class="col-sm-2 col-form-label">الوصف</label>
                                    <div class="col-sm-10">
                                          <textarea class="form-control" name="description" id="description" rows="10">{!! $role->description !!}</textarea>
                                          @foreach ($errors->get('published') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
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
                  <h1 class="m-0 text-primary"> الإدوار</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">جدول الإدوار</a></li>
                        <li class="breadcrumb-item active">تعديل شركة</li>
                  </ol>
            </div>
      </div>
@endsection
