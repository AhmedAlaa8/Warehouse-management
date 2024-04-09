@extends('admin.master')

@section('title')
      <title>Edit User | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warning">
                        <h3 class="card-title float-right">تعديل مستخدم</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.user.update',$user) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">الإسم</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" id="name" value="{{$user->name}}">
                                          @foreach ($errors->get('name') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                        </div>

                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">الهاتف</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('phone') {{ 'is-invalid' }} @enderror" name="phone" id="phone" value="{{$user->phone}}">
                                          @foreach ($errors->get('phone') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                        </div>

                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                                    <div class="col-sm-10">
                                          <input type="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" id="email" value="{{$user->email}}">
                                          @foreach ($errors->get('email') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                        </div>

                        <div class="form-group row">
                              <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input @error('is_admin') {{ 'is-invalid' }} @enderror"
                                          type="checkbox" name="is_admin" id="is_admin" value="1"
                                          {{ $user->is_admin ? 'checked' : '' }}>
                                    <label for="is_admin" class="custom-control-label">ادمن أو موظف ؟</label>
                                    @foreach ($errors->get('is_admin') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                    @endforeach
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
                  <h1 class="m-0 text-primary"> المستخدمين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">جدول المستخدمين</a></li>
                        <li class="breadcrumb-item active">تعديل مستخدم</li>
                  </ol>
            </div>
      </div>
@endsection
