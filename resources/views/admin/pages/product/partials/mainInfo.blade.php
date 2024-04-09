<div class="row">
    <div class="col-12">
          <h4 class="product">بيانات المنتج</h4>
          <div class="post">
                <table class="table table-bordered">
                      <thead>
                            <tr>
                                  <th>الإسم</th>
                                  <th>القيمة</th>
                            </tr>
                      </thead>
                      <tbody>
                            <tr>
                                  <td>الرقم</td>
                                  <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                  <td>الاسم</td>
                                  <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                  <td>slug</td>
                                  <td>{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                  <td>
                                    حالة النشر
                                    @if ($product->published)
                                        <a class="text-success float-left" style="font-size: 1.5rem" id="changePublishStatus" data-href="{{route('admin.product.changePublishStatus',$product->slug)}}">
                                            <i class="fas fa-toggle-on"></i>
                                        </a>
                                    @else
                                        <a class="text-danger float-left" style="font-size: 1.5rem" id="changePublishStatus" data-href="{{route('admin.product.changePublishStatus',$product->slug)}}">
                                            <i class="fas fa-toggle-off"></i>
                                        </a>
                                    @endif
                                    
                                  </td>
                                  @if ($product->published)
                                        <td id="publishedText" class="bg-success">ظاهر</td>
                                  @else
                                        <td id="publishedText" class="bg-danger">مخفي</td>
                                  @endif
                            </tr>
                            <tr>
                                  <td>الوصف</td>
                                  <td>{!! $product->desc !!}</td>
                            </tr>
                            <tr>
                                  <td>
                                    التصنيف 
                                    <button class="btn btn-info" style="float: left"  data-toggle="modal" data-target="#editProductcategoryModal">
                                    <i class="fas fa-pen"></i>
                                    </button>
                                  </td>
                                 
                                  @isset($product->category->name)                                
                                        <td>{{ $product->category->name }}</td>
                                  @else
                                        <td class="text-danger">لا يوجد تصنيف</td>
                                  @endisset
                            </tr>
                            <tr>
                                  <td>المورد
                                    <button class="btn btn-outline-info" style="float: left"  data-toggle="modal" data-target="#editProductsupplierModal">
                                          <i class="fas fa-pen"></i>
                                    </button>
                                  </td>
                                  @isset($product->supplier->name)
                                        <td>{{ $product->supplier->name }}</td>
                                  @else
                                        <td class="text-danger">لا يوجد مورد</td>
                                  @endisset
                            </tr>
                      </tbody>
                </table>
          </div>
    </div>
</div>

@include('admin.pages.product.partials.categoryModals')
@include('admin.pages.product.partials.supplierModals')