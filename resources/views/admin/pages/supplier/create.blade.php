@extends('admin.master')

@section('title')
      <title>Create Supplier | Dashboard</title>
@endsection

@section('css')
      <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2/css/select2.min.css')}}">
      <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء مورد جديد</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.supplier.store') }}">
                        @csrf
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">
                                          الإسم 
                                          <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" id="name" value="{{old('name')}}">
                                          @foreach ($errors->get('name') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="company_id" class="col-sm-2 col-form-label">اسم الشركة</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible company_id" style="width: 100%;" data-select2-id="1"
                                          tabindex="-1" aria-hidden="true" name="company_id" id="company_id">
                                                <option>اختر</option>
                                                @foreach ($companies as $item)
                                                      <option value="{{$item->id}}" {{old('company_id') == $item->id ? "selected" : ""}}>{{$item->name}}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('company_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                                    <div class="col-sm-10">
                                          <input type="email" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" id="email" value="{{old('email')}}">
                                          @foreach ($errors->get('email') as $message)
                                          <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>

                              

                              <div class="form-group row">
                                    <label for="phone1" class="col-sm-2 col-form-label">
                                          الهاتف 1
                                    </label>
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
                  <h1 class="m-0 text-primary"> الموردين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.supplier.index') }}">جدول الموردين</a></li>
                        <li class="breadcrumb-item active">إنشاء موَرِّد</li>
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