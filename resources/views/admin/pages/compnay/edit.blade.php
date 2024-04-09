@extends('admin.master')

@section('title')
      <title>Edit Company | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warning">
                        <h3 class="card-title float-right">تعديل شركة</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.company.update',$company) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                                <x-form.text name="name" label="الإسم" :value="$company->name" />
                                <x-form.text name="phone1" label="  هاتف الشركة 1 " value="{{$company->phone1}}"  />
                                <x-form.text name="phone2" label="  هاتف الشركة 2" value="{{$company->phone2}} "/>
                                <x-form.text name="address" label=" العنوان " value="{{$company->address}}"/>
                                <x-form.text name="manager_name" label=" اسم المدير " value="{{$company->manager_name}}" />
                                <x-form.text name="manager_phone" label=" هاتف المدير " value="{{$company->manager_phone}}" />


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
                  <h1 class="m-0 text-primary"> الشركات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">جدول الشركات</a></li>
                        <li class="breadcrumb-item active">تعديل شركة</li>
                  </ol>
            </div>
      </div>
@endsection
