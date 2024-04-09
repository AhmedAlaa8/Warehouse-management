@extends('admin.master')

@section('title')
    <title>Create Product | Dashboard</title>
@endsection


@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title float-right">انشاء منتج جديدة</h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('admin.product.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">
                            الإسم
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror"
                                name="name" id="name" value="{{ old('name') }}">
                            @foreach ($errors->get('name') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="category_id" class="col-sm-4 col-form-label">التصنيف
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible category_id"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        name="category_id" id="category_id">
                                        <option>اختر</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @foreach ($errors->get('category_id') as $message)
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="supplier_id" class="col-sm-4 col-form-label">اسم المورد
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible supplier_id"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        name="supplier_id" id="supplier_id">
                                        <option>اختر</option>
                                        @foreach ($suppliers as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('supplier_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @foreach ($errors->get('supplier_id') as $message)
                                        <span class="text-danger">{{ $message }}</span> <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="store_id" class="col-sm-4 col-form-label">المخزن
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
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
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="unit_id" class="col-sm-4 col-form-label">الوحدة
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control select2 select2-hidden-accessible unit_id"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        name="unit_id" id="unit_id">
                                        <option value="">اختر</option>
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
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="count" class="col-sm-4 col-form-label">الكمبة
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01"
                                        class="form-control @error('count') {{ 'is-invalid' }} @enderror" name="count"
                                        id="count" value="{{ old('count') }}">
                                    @foreach ($errors->get('count') as $message)
                                        <span class="text-danger">{{ $message }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="buy_price" class="col-sm-4 col-form-label">سعر الشراء
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01"
                                        class="form-control @error('buy_price') {{ 'is-invalid' }} @enderror"
                                        name="buy_price" id="buy_price" value="{{ old('buy_price') }}">
                                    @foreach ($errors->get('buy_price') as $message)
                                        <span class="text-danger">{{ $message }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="trade_price" class="col-sm-4 col-form-label">سعر الجملة
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01"
                                        class="form-control @error('trade_price') {{ 'is-invalid' }} @enderror"
                                        name="trade_price" id="trade_price" value="{{ old('trade_price') }}">
                                    @foreach ($errors->get('trade_price') as $message)
                                        <span class="text-danger">{{ $message }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="price" class="col-sm-4 col-form-label">سعر القطاعي
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01"
                                        class="form-control @error('price') {{ 'is-invalid' }} @enderror" name="price"
                                        id="price" value="{{ old('price') }}">
                                    @foreach ($errors->get('price') as $message)
                                        <span class="text-danger">{{ $message }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <label for="discount" class="col-sm-4 col-form-label">الخصم
                                </label>
                                <div class="col-sm-8">
                                    <input type="number" step="0.01"
                                        class="form-control @error('discount') {{ 'is-invalid' }} @enderror"
                                        name="discount" id="discount" value="0">
                                    @foreach ($errors->get('discount') as $message)
                                        <span class="text-danger">{{ $message }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="expire_date" class="col-sm-4 col-form-label">تاريخ الإنتهاء</label>
                                <div class="col-sm-8">
                                    <input type="date"
                                        class="form-control @error('expire_date') {{ 'is-invalid' }} @enderror"
                                        name="expire_date" id="expire_date" value="{{ old('expire_date') }}">
                                    @foreach ($errors->get('expire_date') as $message)
                                        <span class="text-danger">{{ $message }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="form-group row">
                        <label for="desc" class="col-sm-2 col-form-label">الوصف</label>
                        <div class="col-sm-10">
                            <textarea name="desc" id="desc" cols="30" rows="10" data-editor="ClassicEditor">{!! old('desc') !!}</textarea>
                            @foreach ($errors->get('desc') as $message)
                                <span class="text-danger">{{ $message }}</span>
                            @endforeach
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input @error('published') {{ 'is-invalid' }} @enderror"
                                type="checkbox" name="published" id="published" value="1" checked>
                            <label for="published" class="custom-control-label">حالة النشر</label>
                            @foreach ($errors->get('published') as $message)
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
            <h1 class="m-0 text-primary">المنتجات</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">جدول المنتجات</a></li>
                <li class="breadcrumb-item active">إنشاء وحدة</li>
            </ol>
        </div>
    </div>
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {
            $('.select2').select2()
            ClassicEditor.create(document.querySelector('#desc'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
