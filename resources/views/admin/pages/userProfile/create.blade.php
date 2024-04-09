@extends('admin.master')

@section('title')
      <title>Create User Profile | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right"> بيانات المستخدم</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.userProfile.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="phone1" class="col-sm-2 col-form-label">الهاتف 1</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('phone1') {{ 'is-invalid' }} @enderror"
                                                name="phone1" id="phone1" value="{{ $user->profile->phone1 ?? '' }}">
                                          @foreach ($errors->get('phone1') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="phone2" class="col-sm-2 col-form-label">الهاتف 2</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('phone2') {{ 'is-invalid' }} @enderror"
                                                name="phone2" id="phone2" value="{{ $user->profile->phone2 ?? '' }}">
                                          @foreach ($errors->get('phone2') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="home_phone" class="col-sm-2 col-form-label">هاتف المنزل</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('home_phone') {{ 'is-invalid' }} @enderror"
                                                name="home_phone" id="home_phone"
                                                value="{{ $user->profile->home_phone ?? '' }}">
                                          @foreach ($errors->get('home_phone') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">العنوان</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('address') {{ 'is-invalid' }} @enderror"
                                                name="address" id="address" value="{{ $user->profile->address ?? '' }}">
                                          @foreach ($errors->get('address') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="job" class="col-sm-2 col-form-label">الوظيفة</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('job') {{ 'is-invalid' }} @enderror" name="job"
                                                id="job" value="{{ $user->profile->job ?? '' }}">
                                          @foreach ($errors->get('job') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="type" class="col-sm-2 col-form-label">نوع المستخدم</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible type"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="type" id="type">
                                                <option>اختر</option>
                                                @foreach (getUserTypes() as $en => $info)
                                                      <option value="{{ $en }}"
                                                            {{ ($user->profile->type ?? '') == $en ? 'selected' : '' }}>
                                                            {{ $info['ar'] }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('type') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="credit" class="col-sm-2 col-form-label">الرصيد</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('credit') {{ 'is-invalid' }} @enderror"
                                                name="credit" id="credit" value="{{ $user->profile->credit ?? '' }}">
                                          @foreach ($errors->get('credit') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="total_paid" class="col-sm-2 col-form-label">اجمالي ما دفع</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('total_paid') {{ 'is-invalid' }} @enderror"
                                                name="total_paid" id="total_paid"
                                                value="{{ $user->profile->total_paid ?? '' }}">
                                          @foreach ($errors->get('total_paid') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="total_earned" class="col-sm-2 col-form-label">اجمالي المكسب</label>
                                    <div class="col-sm-10">
                                          <input type="text"
                                                class="form-control @error('total_earned') {{ 'is-invalid' }} @enderror"
                                                name="total_earned" id="total_earned"
                                                value="{{ $user->profile->total_earned ?? '' }}">
                                          @foreach ($errors->get('total_earned') as $message)
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
                        <li class="breadcrumb-item active">بيانات مستخدم</li>
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