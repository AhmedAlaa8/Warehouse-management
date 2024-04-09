
<!-- Modal -->
<div class="modal fade" id="editProductcategoryModal" tabindex="-1" role="dialog"aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductcategoryModal">تعديل التصنيف</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.product.updateCategory',$product) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

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




                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">تعديل</button>            
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>

        </div>
    </div>
</div>

