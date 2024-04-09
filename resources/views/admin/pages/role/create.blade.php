@extends('admin.master')

@section('title')
      <title>Create Role | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء دور جديد</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.role.store') }}">
                        @csrf
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">الإسم</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" id="name" value="{{old('name')}}">
                                          @foreach ($errors->get('name') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="display_name" class="col-sm-2 col-form-label">الإسم المعروض</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('display_name') {{ 'is-invalid' }} @enderror" name="display_name" id="display_name" value="{{old('display_name')}}">
                                          @foreach ($errors->get('display_name') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">الوصف</label>
                                    <div class="col-sm-10">
                                          <textarea class="form-control @error('description') {{ 'is-invalid' }} @enderror" name="description" rows="5" id="description">{!! old('description') !!}</textarea>
                                          @foreach ($errors->get('description') as $message)
                                                <span class="text-danger">{{ $message }}</span>
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
                  <h1 class="m-0 text-primary"> الأدوار</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">جدول الأدوار</a></li>
                        <li class="breadcrumb-item active">إنشاء دور</li>
                  </ol>
            </div>
      </div>
@endsection
