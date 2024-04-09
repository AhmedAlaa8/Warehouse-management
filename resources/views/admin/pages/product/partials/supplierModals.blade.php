
<!-- Modal -->
<div class="modal fade" id="editProductsupplierModal" tabindex="-1" role="dialog"aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductsupplierModal">تعديل المورد</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ route('admin.product.updateSupplier',$product) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="supplier_id" class="col-sm-2 col-form-label">المورد</label>
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
    </div>
</div>

