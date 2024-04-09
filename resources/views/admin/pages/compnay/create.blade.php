@extends('admin.master')

@section('title')
      <title>Create Company | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء شركة جديدة</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.company.store') }}">
                        @csrf
                        <div class="card-body">
                            <x-form.text name="name" label="الإسم" :value="old('name')" />
                            <x-form.text name="phone1" label="  هاتف الشركة 1" :value="old('phone1')" />
                            <x-form.text name="phone2" label="  هاتف الشركة 2" :value="old('phone2')" />
                            <x-form.text name="address" label=" العنوان " :value="old('address')" />
                            <x-form.text name="manager_name" label=" اسم المدير " :value="old('manager_name')" />
                            <x-form.text name="manager_phone" label=" هاتف المدير " :value="old('manager_phone')" />



                              <div class="form-group row">
                                    <label for="manager_phone" class="col-sm-2 col-form-label">هاتف المدير</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('manager_phone') {{ 'is-invalid' }} @enderror" name="manager_phone" id="manager_phone" value="{{old('manager_phone')}}">
                                          @foreach ($errors->get('manager_phone') as $message)
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
                  <h1 class="m-0 text-primary"> الشركات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">جدول الشركات</a></li>
                        <li class="breadcrumb-item active">إنشاء شركة</li>
                  </ol>
            </div>
      </div>
@endsection
