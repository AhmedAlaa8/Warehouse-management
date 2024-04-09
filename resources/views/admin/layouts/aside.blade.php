<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link">
            <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">أحمد شلبي</span>
      </a>

      <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                        <img src="{{ asset('adminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                              alt="User Image">
                  </div>
                  <div class="info">
                        <a href="#" class="d-block">أحمد شلبي</a>
                  </div>
            </div>

            <div class="form-inline">
                  <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                              aria-label="Search">
                        <div class="input-group-append">
                              <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                              </button>
                        </div>
                  </div>
            </div>

            <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        @include('admin.layouts.partials.company')


                        @include('admin.layouts.partials.supplier')


                        @include('admin.layouts.partials.store')


                        @include('admin.layouts.partials.category')


                        @include('admin.layouts.partials.unit')


                        @include('admin.layouts.partials.product')


                        @include('admin.layouts.partials.productUnit')


                        @include('admin.layouts.partials.user')


                        @include('admin.layouts.partials.role')


                        @include('admin.layouts.partials.storeProduct')


                        @include('admin.layouts.partials.productDetail')


                        @include('admin.layouts.partials.cart')


                        @include('admin.layouts.partials.order')

                  </ul>
            </nav>
      </div>
</aside>
