<div class="row">
      <div class="col-12">
            <div class="d-flex justify-content-between mt-5 mb-2">
                  <h4 class="product">بيانات المنتج في المخزن</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createStoreProductModal">
                        انشاء بيانات منتج في المخزن
                  </button>
            </div>
            <table class="table table-striped">
                  <thead>
                        <tr>
                              <th style="width: 10px"> الرقم التسلسلي</th>
                              <th style="width: 10px"> الرقم </th>
                              <th>المخزن</th>
                              <th>الوحدة</th>
                              <th>العدد</th>
                              <th>سعر الشراء</th>
                              <th>سعر الجملة</th>
                              <th>سعر القطاعي</th>
                              <th>الخصم</th>
                              <th>تاريخ الانتهاء</th>
                              <th>تعديل</th>
                              <th>حذف</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($product->storeProducts as $storeProduct)
                              <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $storeProduct->id }}</td>
                                    <td>{{ $storeProduct->store->name ?? '' }}</td>
                                    <td>{{ $storeProduct->unit->name ?? ''}}</td>
                                    <td>{{ $storeProduct->count }}</td>
                                    <td>{{ $storeProduct->buy_price }}</td>
                                    <td>{{ $storeProduct->trade_price }}</td>
                                    <td>{{ $storeProduct->price }}</td>
                                    <td>{{ $storeProduct->discount }}</td>
                                    <td>{{ $storeProduct->expire_date }}</td>
                                    <td>
                                          <button class="btn btn-info editProductStoreButton" data-href="{{route('admin.storeProduct.update',$storeProduct->id)}}" data-storeproduct="{{$storeProduct}}" data-toggle="modal" data-target="#editProductStoreModal">
                                                <i class="fas fa-pen"></i>
                                          </button>
                                    </td>
                                    <td>
                                          <form action="{{ route('admin.storeProduct.destroy', $storeProduct) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $storeProduct->id }}">
                                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                          </form>
                                    </td>
                              </tr>
                        @endforeach
                  </tbody>
            </table>
      </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editProductStoreModal" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات منتج في المخزن</h5>
                  </div>
                  <div class="modal-body">
                        <form id="editProductStoreForm" class="form-horizontal" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="card-body">


                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">


                                    <div class="form-group row">
                                          <label for="store_id" class="col-sm-2 col-form-label">المخزن</label>
                                          <div class="col-sm-10">
                                                <select class="form-control select2 select2-hidden-accessible store_id"
                                                      style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                      aria-hidden="true" name="store_id" id="store_id">
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
                                                      style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                      aria-hidden="true" name="unit_id" id="unit_id">
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
                                          <label for="count" class="col-sm-2 col-form-label">الكمية</label>
                                          <div class="col-sm-10">
                                                <input type="number" 
                                                      class="form-control @error('count') {{ 'is-invalid' }} @enderror"
                                                      name="count" id="count" value="{{ old('count') }}">
                                                @foreach ($errors->get('count') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>


                                    <div class="form-group row">
                                          <label for="buy_price" class="col-sm-2 col-form-label">سعر الشراء</label>
                                          <div class="col-sm-10">
                                                <input type="number" step=0.01
                                                      class="form-control @error('buy_price') {{ 'is-invalid' }} @enderror"
                                                      name="buy_price" id="buy_price" value="{{ old('buy_price') }}">
                                                @foreach ($errors->get('buy_price') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>


                                    <div class="form-group row">
                                          <label for="trade_price" class="col-sm-2 col-form-label">سعر الجملة</label>
                                          <div class="col-sm-10">
                                                <input type="number" step=0.01
                                                      class="form-control @error('trade_price') {{ 'is-invalid' }} @enderror"
                                                      name="trade_price" id="trade_price"
                                                      value="{{ old('trade_price') }}">
                                                @foreach ($errors->get('trade_price') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>


                                    <div class="form-group row">
                                          <label for="price" class="col-sm-2 col-form-label">سعر القطاعي</label>
                                          <div class="col-sm-10">
                                                <input type="number" step=0.01
                                                      class="form-control @error('price') {{ 'is-invalid' }} @enderror"
                                                      name="price" id="price" value="{{ old('price') }}">
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
                                                  name="discount" id="discount" value="{{ old('discount') }}">
                                                  
                                              @foreach ($errors->get('discount') as $message)
                                                  <span class="text-danger">{{ $message }}</span>
                                              @endforeach
                                          </div>
                                      </div>


                                    <div class="form-group row">
                                          <label for="expire_date" class="col-sm-2 col-form-label">تاريخ
                                                الإنتهاء</label>
                                          <div class="col-sm-10">
                                                <input type="date"
                                                      class="form-control @error('expire_date') {{ 'is-invalid' }} @enderror"
                                                      name="expire_date" id="expire_date"
                                                      value="{{ old('expire_date') }}">
                                                @foreach ($errors->get('expire_date') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>



                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">إغلاق</button>
                                    <button type="submit" class="btn btn-primary">إنشاء</button>
                              </div>
                        </form>
                  </div>

            </div>
      </div>
</div>





<!-- Modal -->
<div class="modal fade" id="createStoreProductModal" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">إنشاء بيانات منتج في المخزن</h5>
                  </div>
                  <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.storeProduct.store') }}">
                              @csrf
                              <div class="card-body">


                                    <input type="hidden" name="product_id" value="{{ $product->id }}">


                                    <div class="form-group row">
                                          <label for="store_id" class="col-sm-2 col-form-label">المخزن</label>
                                          <div class="col-sm-10">
                                                <select class="form-control select2 select2-hidden-accessible store_id"
                                                      style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                      aria-hidden="true" name="store_id" id="store_id">
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
                                                      style="width: 100%;" data-select2-id="1" tabindex="-1"
                                                      aria-hidden="true" name="unit_id" id="unit_id">
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
                                                <input type="number" step=0.01
                                                      class="form-control @error('count') {{ 'is-invalid' }} @enderror"
                                                      name="count" id="count" value="{{ old('count') }}">
                                                @foreach ($errors->get('count') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>


                                    <div class="form-group row">
                                          <label for="buy_price" class="col-sm-2 col-form-label">سعر الشراء</label>
                                          <div class="col-sm-10">
                                                <input type="number" step=0.01
                                                      class="form-control @error('buy_price') {{ 'is-invalid' }} @enderror"
                                                      name="buy_price" id="buy_price" value="{{ old('buy_price') }}">
                                                @foreach ($errors->get('buy_price') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>


                                    <div class="form-group row">
                                          <label for="trade_price" class="col-sm-2 col-form-label">سعر الجملة</label>
                                          <div class="col-sm-10">
                                                <input type="number" step=0.01
                                                      class="form-control @error('trade_price') {{ 'is-invalid' }} @enderror"
                                                      name="trade_price" id="trade_price"
                                                      value="{{ old('trade_price') }}">
                                                @foreach ($errors->get('trade_price') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>


                                    <div class="form-group row">
                                          <label for="price" class="col-sm-2 col-form-label">سعر القطاعي</label>
                                          <div class="col-sm-10">
                                                <input type="number" step=0.01
                                                      class="form-control @error('price') {{ 'is-invalid' }} @enderror"
                                                      name="price" id="price" value="{{ old('price') }}">
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
                                          <label for="expire_date" class="col-sm-2 col-form-label">تاريخ
                                                الإنتهاء</label>
                                          <div class="col-sm-10">
                                                <input type="date"
                                                      class="form-control @error('expire_date') {{ 'is-invalid' }} @enderror"
                                                      name="expire_date" id="expire_date"
                                                      value="{{ old('expire_date') }}">
                                                @foreach ($errors->get('expire_date') as $message)
                                                      <span class="text-danger">{{ $message }}</span>
                                                @endforeach
                                          </div>
                                    </div>



                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">إغلاق</button>
                                    <button type="submit" class="btn btn-primary">إنشاء</button>
                              </div>
                        </form>
                  </div>

            </div>
      </div>
</div>
