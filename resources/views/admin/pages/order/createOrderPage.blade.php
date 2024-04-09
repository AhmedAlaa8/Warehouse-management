@extends('admin.master')

@section('title')
      <title>Create Order | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء اوردر</h3>
                  </div>

                  <form class="form-horizontal" method="get" action="{{ route('admin.order.createOrderPage') }}">
                        @csrf
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="user_id" class="col-sm-2 col-form-label">المستخدم</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible user_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="user_id" id="user_id">
                                                <option value="">اختر</option>
                                                @foreach ($users as $user)
                                                      <option value="{{ $user->id . "-" . $user->type }}"
                                                            {{ request('user_id') == ($user->id . "-" . $user->type) ? 'selected' : '' }}>
                                                            {{ $user->type }} :: 
                                                            {{ $user->name }}
                                                      </option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('user_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="order_type" class="col-sm-2 col-form-label">نوع الفاتورة</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible order_type"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="order_type" id="order_type">
                                                <option value="">اختر</option>
                                                @foreach (getOrderTypes() as $en => $arArray)
                                                      <option value="{{ $en }}"
                                                            {{ request('order_type') == $en ? 'selected' : '' }}>
                                                            {{ $arArray['ar'] }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('order_type') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="row my-3">
                                    <div class="input-group col-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">الاجمالي</span>
                                          </div>
                                          <input type="number" step=any class="form-control" name="total"
                                                value="{{ $cartTotal ?? 0 }}" disabled>
                                    </div>
                                    <div class="input-group col-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">الخصم</span>
                                          </div>
                                          <input type="number" step=any class="form-control" name="discount"
                                                value="{{ $cartTotalDiscount ?? 0 }}" readonly>
                                    </div>
                                    <div class="input-group col-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">اجمالي بعد الخصم</span>
                                          </div>
                                          <input type="number" step=any class="form-control" name="total_after_discount"
                                                disabled>
                                    </div>
                              </div>

                              <div class="row my-3">
                                    <div class="input-group col-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">المدفوع</span>
                                          </div>
                                          <input type="number" step=any class="form-control" name="paid"
                                                value="{{ old('paid') ?? 0 }}">
                                    </div>
                                    <div class="input-group col-4">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">الباقي</span>
                                          </div>
                                          <input type="number" step=any class="form-control" name="left"
                                                value="{{ old('left') ?? 0 }}" disabled>
                                    </div>
                              </div>

                              <button type="submit" name="show_details" class="btn btn-info">اظهار الاوردر</button>

                              <button type="submit" name="createOrder" class="btn btn-success">اتمام الاوردر</button>

                              <table class="table table-bordered table-striped mt-5">
                                    <thead>
                                          <tr>
                                                <th>
                                                      التسلسل
                                                </th>
                                                <th>
                                                      اسم المنتج
                                                </th>
                                                <th>
                                                      الوحدة
                                                </th>
                                                <th>
                                                      الكمية
                                                </th>
                                                <th>
                                                      سعر القطعة
                                                </th>
                                                <th>
                                                      السعر الكلي
                                                </th>
                                                <th>
                                                     الخصم
                                                </th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @isset($userCart)
                                                @forelse ($userCart as $index => $cart)
                                                      <tr>
                                                            <td>{{ ++$index }}</td>

                                                            @isset($cart->storeProduct->product)
                                                                  <td>
                                                                        {{ $cart->storeProduct->product->name }}
                                                                  </td>
                                                            @else
                                                                  <td class="text-danger">لا يوجد منتج</td>
                                                            @endisset

                                                            @isset($cart->storeProduct->unit)
                                                                  <td>
                                                                        {{ $cart->storeProduct->unit->name }}
                                                                  </td>
                                                            @else
                                                                  <td class="text-danger">لا يوجد وحدة</td>
                                                            @endisset

                                                            <td>{{ $cart->count }}</td>
                                                            <td>{{ $cart->price }}</td>
                                                            <td>{{ $cart->total_price }}</td>
                                                            <td>{{ $cart->discount }}</td>
                                                      </tr>
                                                @empty
                                                @endforelse
                                          @endisset

                                    </tbody>
                              </table>
                        </div>
                  </form>
            </div>
      </div>
@endsection




@section('bread')
      <div class="row mb-2">
            <div class="col-sm-6">
                  <h1 class="m-0 text-primary">الأوردرات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">جدول الأوردرات</a></li>
                        <li class="breadcrumb-item active">عمل اوردر</li>
                  </ol>
            </div>
      </div>
@endsection


@section('javascript')
      <script>
            $(document).ready(function() {
                  $('.select2').select2()

                  calculateTotalAfterDiscount()
                  calculateLeftAfterPaid()

                  $('input[name="discount"]').on('input', function() {
                        calculateTotalAfterDiscount()
                        calculateLeftAfterPaid()
                  })

                  $('input[name="paid"]').on('input', function() {
                        calculateTotalAfterDiscount()
                        calculateLeftAfterPaid()
                  })

            });

            function calculateTotalAfterDiscount() {
                  let discount = parseFloat($('input[name="discount"]').val()).toFixed(2)
                  let total = parseFloat($('input[name="total"]').val()).toFixed(2)
                  if (isNaN(discount) || isNaN(total)) {
                        $('input[name="total_after_discount"]').val(0)
                  } else {
                        $('input[name="total_after_discount"]').val(parseFloat(total - discount).toFixed(2))
                  }
            }

            function calculateLeftAfterPaid() {
                  let paid = parseFloat($('input[name="paid"]').val()).toFixed(2)
                  let total_after_discount = parseFloat($('input[name="total_after_discount"]').val()).toFixed(2)
                  if (isNaN(paid) || isNaN(total_after_discount)) {
                        $('input[name="left"]').val(0)
                  } else {
                        $('input[name="left"]').val(parseFloat(total_after_discount - paid).toFixed(2))
                  }
            }
      </script>
@endsection
