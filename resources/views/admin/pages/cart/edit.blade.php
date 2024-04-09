@extends('admin.master')

@section('title')
      <title>Edit Cart | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warning">
                        <h3 class="card-title float-right">تعديل عربة التسوق</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.cart.update',$cart) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">


                              <div class="form-group row">
                                    <label for="store_product_id" class="col-sm-2 col-form-label">المنتج من المخزن</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible store_product_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="store_product_id" id="store_product_id">
                                                <option>اختر</option>
                                                @foreach ($storeProducts as $storeProduct)
                                                      <option value="{{ $storeProduct->id }}"
                                                            {{ $cart->store_product_id == $storeProduct->id ? 'selected' : '' }}>
                                                            {{ $storeProduct->product->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('store_product_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="user_id" class="col-sm-2 col-form-label">المستخدم</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible user_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="user_id" id="user_id">
                                                <option>اختر</option>
                                                @foreach ($users as $user)
                                                      <option value="{{ $user->id }}"
                                                            {{ $cart->user_id == $user->id ? 'selected' : '' }}>
                                                            {{ $user->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('user_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="count" class="col-sm-2 col-form-label">الكمبة</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('count') {{ 'is-invalid' }} @enderror" name="count" id="count" value="{{$cart->count}}">
                                          @foreach ($errors->get('count') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="price" class="col-sm-2 col-form-label">سعر الوحدة</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('price') {{ 'is-invalid' }} @enderror" name="price" id="price" value="{{$cart->price}}">
                                          @foreach ($errors->get('price') as $message)
                                          <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="total_price" class="col-sm-2 col-form-label">السعر الكلي</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('total_price') {{ 'is-invalid' }} @enderror" name="total_price" id="total_price" value="{{$cart->total_price}}">
                                          @foreach ($errors->get('total_price') as $message)
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
                  <h1 class="m-0 text-primary">عربة التسوق</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.cart.index') }}">جدول عربة التسوق</a></li>
                        <li class="breadcrumb-item active">تعديل عربة التسوق</li>
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