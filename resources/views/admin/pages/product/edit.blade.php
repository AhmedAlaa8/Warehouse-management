@extends('admin.master')

@section('title')
      <title>Edit Product | Dashboard</title>
@endsection

@section('css')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
      <div class="col-12">
            <div class="card">
                  <div class="card-header bg-warning">
                        <h3 class="card-title float-right">تعديل منتج</h3>
                  </div>

                  <form class="form-horizontal" method="POST" action="{{ route('admin.product.update',$product) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                              <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">الإسم</label>
                                    <div class="col-sm-10">
                                          <input type="text" class="form-control @error('name') {{ 'is-invalid' }} @enderror"
                                                name="name" id="name" value="{{ $product->name }}">
                                          @foreach ($errors->get('name') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <div class="custom-control custom-checkbox">
                                          <input class="custom-control-input @error('published') {{ 'is-invalid' }} @enderror"
                                                type="checkbox" name="published" id="published" value="1"
                                                {{ $product->published ? 'checked' : '' }}>
                                          <label for="published" class="custom-control-label">حالة النشر</label>
                                          @foreach ($errors->get('published') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="published" class="col-sm-2 col-form-label">الوصف</label>
                                    <div class="col-sm-10">
                                          <textarea name="desc" id="desc" cols="30" rows="10" data-editor="ClassicEditor">{!! $product->desc !!}</textarea>
                                          @foreach ($errors->get('published') as $message)
                                                <span class="text-danger">{{ $message }}</span>
                                          @endforeach
                                    </div>
                              </div>

                              <div class="form-group row">
                                    <label for="category_id" class="col-sm-2 col-form-label">التصنيف</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible category_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="category_id" id="category_id">
                                                <option>اختر</option>
                                                @foreach ($categories as $item)
                                                      <option value="{{ $item->id }}"
                                                            {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('category_id') as $message)
                                                <span class="text-danger">{{ $message }}</span> <br>
                                          @endforeach
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="supplier_id" class="col-sm-2 col-form-label">اسم المورد</label>
                                    <div class="col-sm-10">
                                          <select class="form-control select2 select2-hidden-accessible supplier_id"
                                                style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                                name="supplier_id" id="supplier_id">
                                                <option>اختر</option>
                                                @foreach ($suppliers as $item)
                                                      <option value="{{ $item->id }}"
                                                            {{ $product->supplier_id == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                @endforeach
                                          </select>
                                          @foreach ($errors->get('supplier_id') as $message)
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
                  <h1 class="m-0 text-primary"> المنتجات</h1>
            </div>
            <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">جدول المنتجات</a></li>
                        <li class="breadcrumb-item active">تعديل منتج</li>
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
