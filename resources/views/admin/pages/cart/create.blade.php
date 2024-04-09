@extends('admin.master')

@section('title')
      <title>Create Cart | Dashboard</title>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-primary">
                        <h3 class="card-title float-right">انشاء عربة تسوق جديدة</h3>
                        <a href="{{ route('admin.order.createOrderPage') }}" class="btn btn-dark">عمل اوردر</a>
                  </div>

                  <form id="cart-form" class="form-horizontal" method="POST" action="{{ route('admin.cart.store') }}">
                        @csrf
                        <div class="card-body">

                              <div class="form-group row">
                                    <label for="user_id" class="col-sm-2 col-form-label">المستخدم</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible user_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="user_id" id="user_id">
                                                <option>اختر</option>
                                                @foreach ($users as $user)
                                                      <option value="{{ $user->id . "-" . $user->type }}"
                                                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                            {{$user->type}} ::
                                                            {{ $user->name }}</option>
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

                              <button type="button" class="btn btn-success mb-1" id="add-cart-item">
                                    <i class="fas fa-cart-plus"></i>
                              </button>
                              <table class="table table-bordered">
                                    <thead>
                                          <tr>
                                                <th style="width: 500px">المنتج</th>
                                                <th>الكمية</th>
                                                <th>سعر الوحدة</th>
                                                <th>الخصم</th>
                                                <th>السعر الكلي</th>
                                                <th>حذف</th>
                                          </tr>
                                    </thead>
                                    <tbody id="carts-table">
                                          <tr id="cart-item">
                                                <td>
                                                      <div>
                                                            <select class="form-control select2 select2-hidden-accessible store_product_id"
                                                                  style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                                  name="store_product_id[]" id="store_product_id">
                                                                  <option>اختر</option>
                                                                  @foreach ($storeProducts as $storeProduct)
                                                                        <option value="{{ $storeProduct->id }}">
                                                                              {{ $storeProduct->product->name }} -
                                                                              {{ $storeProduct->store->name }} -
                                                                              {{ $storeProduct->unit->name }} - {{ $storeProduct->count }}
                                                                        </option>
                                                                  @endforeach
                                                            </select>
                                                            @foreach ($errors->get('store_product_id') as $message)
                                                                  <span class="text-danger">{{ $message }}</span> <br>
                                                            @endforeach
                                                      </div>
                                                </td>
                                                <td>
                                                      <div>
                                                            <input type="number" step=any
                                                                  class="form-control count @error('count') {{ 'is-invalid' }} @enderror"
                                                                  name="count[]" id="count">
                                                            @foreach ($errors->get('count') as $message)
                                                                  <span class="text-danger">{{ $message }}</span>
                                                            @endforeach
                                                      </div>
                                                </td>
                                                <td>
                                                      <div>
                                                            <input type="number" step=any
                                                                  class="form-control price @error('price') {{ 'is-invalid' }} @enderror"
                                                                  name="price[]" id="price">
                                                            @foreach ($errors->get('price') as $message)
                                                                  <span class="text-danger">{{ $message }}</span>
                                                            @endforeach
                                                      </div>
                                                </td>
                                                <td>
                                                      <div>
                                                            <input type="number" step=any
                                                                  class="form-control discount @error('discount') {{ 'is-invalid' }} @enderror"
                                                                  name="discount[]" id="discount">
                                                            @foreach ($errors->get('discount') as $message)
                                                                  <span class="text-danger">{{ $message }}</span>
                                                            @endforeach
                                                      </div>
                                                </td>
                                                <td>
                                                      <div>
                                                       <input type="number" readonly step=any
                                                                  class="form-control total_price @error('total_price') {{ 'is-invalid' }} @enderror"
                                                                  name="total_price[]" id="total_price">
                                                            @foreach ($errors->get('total_price') as $message)
                                                                  <span class="text-danger">{{ $message }}</span>
                                                            @endforeach
                                                      </div>
                                                </td>
                                                <td>
                                                      <div>
                                                            <button type="button"  class="btn btn-outline-danger ml-2 delete_item">
                                                                    <i class="fas fa-trash"></i>
                                                            </button>
                                                      </div>
                                                </td>
                                          </tr>
                                    </tbody>
                              </table>
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
                  <h1 class="m-0 text-primary">عربة التسوق</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.cart.index') }}">جدول عربة التسوق</a></li>
                        <li class="breadcrumb-item active">إنشاء عربة التسوق</li>
                  </ol>
            </div>
      </div>
@endsection


@section('javascript')
      <script>
            $(document).ready(function() {
                  $('.select2').select2()
                  getPriceOfProduct()
                  whenCountChange()
                  whenPriceChange()
                  whenDiscountChange()
                  handelDeleteItem()
                  handleChangeOfOrderType()

                  let counter = 1;
                  $('#add-cart-item').on('click',function(){
                        $('#carts-table').append(`
                        <tr id="cart-item" class="ss">
                              <td>
                                    <div>
                                          <select class="form-control select2 select2-hidden-accessible store_product_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="store_product_id[]" id="store_product_id${counter}">
                                                <option>اختر</option>
                                                @foreach ($storeProducts as $storeProduct)
                                                      <option value="{{ $storeProduct->id }}">
                                                            {{ $storeProduct->product->name }} -
                                                            {{ $storeProduct->store->name }} -
                                                            {{ $storeProduct->unit->name }} - {{ $storeProduct->count }}
                                                      </option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('store_product_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </td>
                              <td>
                                    <div>
                                          <input type="number" step=any
                                                class="form-control count @error('count') {{ 'is-invalid' }} @enderror"
                                                name="count[]" id="count${counter}">
                                          @foreach ($errors->get('count') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </td>
                              <td>
                                    <div>
                                          <input type="number" step=any
                                                class="form-control price @error('price') {{ 'is-invalid' }} @enderror"
                                                name="price[]" id="price${counter}">
                                          @foreach ($errors->get('price') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </td>
                              <td>
                                    <div>
                                          <input type="number" step=any
                                                class="form-control discount @error('discount') {{ 'is-invalid' }} @enderror"
                                                name="discount[]" id="discount${counter}">
                                          @foreach ($errors->get('discount') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </td>
                              <td>
                                    <div>
                                          <input type="number" readonly step=any
                                                class="form-control total_price @error('total_price') {{ 'is-invalid' }} @enderror"
                                                name="total_price[]" id="total_price${counter}">
                                          @foreach ($errors->get('total_price') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </td>
                              <td>
                                    <div>
                                          <button type="button"  class="btn btn-outline-danger ml-2 delete_item">
                                                  <i class="fas fa-trash"></i>
                                          </button>
                                    </div>
                              </td>
                        </tr>
                        `)
                        $('.select2').select2()
                        counter += 1

                        getPriceOfProduct()
                        whenCountChange()
                        whenPriceChange()
                        whenDiscountChange()
                        handelDeleteItem()
                  })





                  $('#cart-form').submit(function(e){
                        e.preventDefault()
                        let userId = $('#user_id').val()
                        let prices = [];
                        let discounts = [];
                        let counts = [];
                        let total_prices = [];
                        let storeProducts = [];


                        $('.price').each(function(index,element){
                              prices.push($(element).val())
                        })

                        $('.count').each(function(index,element){
                              counts.push($(element).val())
                        })

                        $('.discount').each(function(index,element){
                              discounts.push($(element).val())
                        })

                        $('.total_price').each(function(index,element){
                              total_prices.push($(element).val())
                        })

                        $('.store_product_id').each(function(index,element){
                              storeProducts.push($(element).val())
                        })
                        
                        $.ajax({
                              url: "{{route('admin.ajax.cart.ajaxStoreCart')}}",
                              type: 'POST',
                              data:{
                                    userId,
                                    prices,
                                    counts,
                                    discounts,
                                    total_prices,
                                    storeProducts
                              },
                              success: function (res) {
                                    if(res == 1)
                                    {
                                          Swal.fire({
                                                title: 'نجاح!',
                                                text: 'تم اضافة عربة التسوق بنجاح',
                                                icon: 'success',
                                                confirmButtonText: 'حلو جدا'
                                          }).then(function(){
                                                location.href = '/admin/order/createOrderPage';
                                          })
                                    }
                                    else
                                    {
                                          Swal.fire({
                                                title: 'خطا!',
                                                text: 'حدث خطا ما',
                                                icon: 'error',
                                                confirmButtonText: 'تمام'
                                          })
                                          console.log(res)
                                    }
                              },
                              error: function (res) {
                                    console.log(res)
                                    Swal.fire({
                                          title: 'خطا!',
                                          text: res.responseJSON.message,
                                          icon: 'error',
                                          confirmButtonText: 'تمام'
                                    })
                                    console.log(res)
                              }
                        });
                  })
            });



            function recalculateTotalPrice(element)
            {
                  price = parseFloat(element.parent().parent().parent().find('.price').val()).toFixed(2)
                  count = parseFloat(element.parent().parent().parent().find('.count').val()).toFixed(2)
                  discount = parseFloat(element.parent().parent().parent().find('.discount').val()).toFixed(2)

                  if(isNaN(price) || isNaN(count))
                  {
                        element.parent().parent().parent().find('.total_price').val(0)
                  }
                  else
                  {
                        element.parent().parent().parent().find('.total_price').val(parseFloat((price - discount) * count).toFixed(2))
                  }
            }

            function getPriceOfProduct()
            {
                  $('.store_product_id').on('change',function(){
                        let id =  $(this).val()
                        let order_type = $('.order_type').val()
                        let userId = $('#user_id').val()
                        let selectElement = $(this)
                       

                        $.ajax({
                              url: "{{route('admin.ajax.storeProduct.ajaxGetStoreProductById')}}",
                              type: 'GET',
                              data:{id : id,order_type:order_type,user_id:userId},
                              success: function (res) {
                                    selectElement.parent().parent().parent().find('.price').val(res.price)
                                    selectElement.parent().parent().parent().find('.discount').val(res.discount)
                                    recalculateTotalPrice(selectElement)
                              },
                              error: function (res) {
                                    console.log(res)
                              }
                        });
                  })
            }


            function handleChangeOfOrderType()
            {
                  $('.order_type').on('change',function(){
                        let order_type = $(this).val()
                        let userId = $('#user_id').val()
                        let selectElement = $(this)

                        let storeProducts = [];
                        $('.store_product_id').each(function(index,element){
                              storeProducts.push($(element).val())
                        })

                        $.ajax({
                              url: "{{route('admin.ajax.storeProduct.ajaxHandleChangeOfOrderType')}}",
                              type: 'GET',
                              data:{store_products : storeProducts,order_type:order_type,user_id:userId},
                              success: function (res) {
                                    let elements = $('.store_product_id')
                                    elements.each((index,element) => {
                                          $(element).parent().parent().parent().find('.price').val(res[index].price)
                                          $(element).parent().parent().parent().find('.discount').val(res[index].discount)
                                          recalculateTotalPrice($(element))
                                    });
                              },
                              error: function (res) {
                                    console.log(res)
                              }
                        });
                  })
            }

            function whenCountChange()
            {
                  $('.count').on('input',function(){
                        recalculateTotalPrice($(this).parent().parent().parent().find('.store_product_id'))
                  })
            }

            function whenPriceChange()
            {
                  $('.price').on('input',function(){
                        recalculateTotalPrice($(this).parent().parent().parent().find('.store_product_id'))
                  })
            }

            function whenDiscountChange()
            {
                  $('.discount').on('input',function(){
                        recalculateTotalPrice($(this).parent().parent().parent().find('.store_product_id'))
                  })
            }
            function handelDeleteItem()
            {
                  $('.delete_item').click(function(){

                        $(this).parent().parent().parent().remove();
                        
                     
                  })
            }
           
            
      </script>
@endsection
