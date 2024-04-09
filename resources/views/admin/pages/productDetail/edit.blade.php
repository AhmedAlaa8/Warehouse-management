@extends('admin.master')

@section('title')
      <title>Edit Product Detail | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warning">
                        <h3 class="card-title float-right">تعديل تفاصيل منتج</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.productDetail.update',$productDetail) }}">
                        @csrf
                        @method('PUT')
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
                                                            {{ $productDetail->product_id == $product->id ? 'selected' : '' }}>
                                                            {{ $product->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('product_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="key" class="col-sm-2 col-form-label">الخاصية</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('key') {{ 'is-invalid' }} @enderror" name="key" id="key" value="{{$productDetail->key}}">
                                          @foreach ($errors->get('key') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="value" class="col-sm-2 col-form-label">القيمة</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('value') {{ 'is-invalid' }} @enderror" name="value" id="value" value="{{$productDetail->value}}">
                                          @foreach ($errors->get('value') as $message)
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
                  <h1 class="m-0 text-primary"> تفاصيل المنتجات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.productDetail.index') }}">جدول تفاصيل المنتجات</a></li>
                        <li class="breadcrumb-item active">تعديل تفاصيل منتج</li>
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