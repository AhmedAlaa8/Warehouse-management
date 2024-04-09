@extends('admin.master')

@section('title')
      <title>Create User | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء مستخدم جديد</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.user.store') }}">
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
                                    <label for="phone" class="col-sm-2 col-form-label">الهاتف</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('phone') {{ 'is-invalid' }} @enderror" name="phone" id="phone" value="{{old('phone')}}">
                                          @foreach ($errors->get('phone') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                                    <div class="col-sm-10">
                                          <input type="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" id="email" value="{{old('email')}}">
                                          @foreach ($errors->get('email') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label"> كلمة المرور</label>
                                    <div class="col-sm-10">
                                          <input type="password" class="form-control @error('password') {{ 'is-invalid' }} @enderror" name="password" id="password">
                                          @foreach ($errors->get('password') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label"> تأكيد كلمة المرور </label>
                                    <div class="col-sm-10">
                                          <input type="password" class="form-control @error('password_confirmation') {{ 'is-invalid' }} @enderror" name="password_confirmation" id="password_confirmation">
                                          @foreach ($errors->get('password_confirmation') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input @error('is_admin') {{ 'is-invalid' }} @enderror"
                                                type="checkbox" name="is_admin" id="is_admin" value="1"
                                                {{ old('is_admin') ? 'checked' : '' }}>
                                          <label for="is_admin" class="custom-control-label">ادمن أو موظف ؟</label>
                                          @foreach ($errors->get('is_admin') as $message)
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
                  <h1 class="m-0 text-primary">المستخدمين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">جدول المستخدمين</a></li>
                        <li class="breadcrumb-item active">إنشاء مستخدم</li>
                  </ol>
            </div>
      </div>
@endsection
