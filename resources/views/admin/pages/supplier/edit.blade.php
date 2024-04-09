@extends('admin.master')

@section('title')
      <title>Edit Supplier | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warninig">
                        <h3 class="card-title float-right">تعديل موَرِّد</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.supplier.update',$supplier) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">الإسم</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror" name="name" id="name" value="{{$supplier->name}}">
                                          @foreach ($errors->get('name') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                              <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">البريد الإلكتروني</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('email') {{ 'is-invalid' }} @enderror" name="email" id="email" value="{{$supplier->email}}">
                                          @foreach ($errors->get('email') as $message)
                                          <span class="text-danger">{{ $message }}</span> <br>
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
                                                      <option value="{{$item->id}}" {{$supplier->company_id == $item->id ? "selected" : ""}}>{{$item->name}}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('company_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
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
                  <h1 class="m-0 text-primary"> الموردين</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.supplier.index') }}">جدول الموردين</a></li>
                        <li class="breadcrumb-item active">تعديل موَرِّد</li>
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