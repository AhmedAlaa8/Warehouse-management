@extends('admin.master')

@section('title')
      <title>Create Product Unit | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء وحدة منتج جديدة</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.productUnit.store') }}">
                        @csrf
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="product_id" class="col-sm-2 col-form-label">المنتج</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible product_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="product_id" id="product_id">
                                                <option>اختر</option>
                                                @foreach ($products as $product)
                                                      <option value="{{ $product->id }}"
                                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                            {{ $product->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('product_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="unit_id" class="col-sm-2 col-form-label">الوحدة الكبيرة</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible unit_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="unit_id" id="unit_id">
                                                <option>اختر</option>
                                                @foreach ($units as $unit)
                                                      <option value="{{ $unit->id }}"
                                                            {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                                            {{ $unit->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('unit_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="count" class="col-sm-2 col-form-label">الكمبة</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('count') {{ 'is-invalid' }} @enderror" name="count" id="count" value="{{old('count')}}">
                                          @foreach ($errors->get('count') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="small_unit_id" class="col-sm-2 col-form-label">الوحدة الصغيرة</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible small_unit_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="small_unit_id" id="small_unit_id">
                                                <option>اختر</option>
                                                @foreach ($units as $unit)
                                                      <option value="{{ $unit->id }}"
                                                            {{ old('small_unit_id') == $unit->id ? 'selected' : '' }}>
                                                            {{ $unit->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('small_unit_id') as $message)
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
                  <h1 class="m-0 text-primary">وحدات المنتجات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.productUnit.index') }}">جدول وحدات المنتجات</a></li>
                        <li class="breadcrumb-item active">إنشاء وحدة المنتجات</li>
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
