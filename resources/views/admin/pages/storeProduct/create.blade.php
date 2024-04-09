@extends('admin.master')

@section('title')
      <title>Create Store Product | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء منتجات مخزن جديدة</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.storeProduct.store') }}">
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
                                    <label for="store_id" class="col-sm-2 col-form-label">المخزن</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible store_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="store_id" id="store_id">
                                                <option>اختر</option>
                                                @foreach ($stores as $store)
                                                      <option value="{{ $store->id }}"
                                                            {{ old('store_id') == $store->id ? 'selected' : '' }}>
                                                            {{ $store->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('store_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="unit_id" class="col-sm-2 col-form-label">الوحدة</label>
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
                                    <label for="buy_price" class="col-sm-2 col-form-label">سعر الشراء</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('buy_price') {{ 'is-invalid' }} @enderror" name="buy_price" id="buy_price" value="{{old('buy_price')}}">
                                          @foreach ($errors->get('buy_price') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="trade_price" class="col-sm-2 col-form-label">سعر الجملة</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('trade_price') {{ 'is-invalid' }} @enderror" name="trade_price" id="trade_price" value="{{old('trade_price')}}">
                                          @foreach ($errors->get('trade_price') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="price" class="col-sm-2 col-form-label">سعر القطاعي</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('price') {{ 'is-invalid' }} @enderror" name="price" id="price" value="{{old('price')}}">
                                          @foreach ($errors->get('price') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>
                              
                                    <div class="form-group row">
                                        <label for="discount" class="col-sm-2 col-form-label">الخصم
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.01" class="form-control @error('discount') {{ 'is-invalid' }} @enderror"
                                                name="discount" id="discount" value="0">
                                                
                                            @foreach ($errors->get('discount') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                

                              <div class="form-group row">
                                    <label for="expire_date" class="col-sm-2 col-form-label">تاريخ الإنتهاء</label>
                                    <div class="col-sm-10">
                                          <input type="date" class="form-control @error('expire_date') {{ 'is-invalid' }} @enderror" name="expire_date" id="expire_date" value="{{old('expire_date')}}">
                                          @foreach ($errors->get('expire_date') as $message)
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
