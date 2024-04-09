<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.order.createOrderPage') }}" class="btn btn-warning mb-1">
                <i class="fas fa-luggage-cart"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block ml-3">
            <a href="{{ route('admin.cart.create') }}" class="btn btn-success mb-1">
                <i class="fas fa-cart-plus"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block ml-3">
            <a href="{{ route('admin.logout') }}" class="btn btn-danger mb-1">
                logout
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-shopping-cart cart"></i>
                <span class="badge badge-warning navbar-badge">{{ $usersWithCartsCount }}</span>
            </a>
            {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                              <i class="fas fa-envelope mr-2"></i> 4 new messages
                              <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                              <i class="fas fa-users mr-2"></i> 8 friend requests
                              <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                              <i class="fas fa-file mr-2"></i> 3 new reports
                              <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                  </div> --}}
        </li>
    </ul>
</nav>
<!-- /.navbar -->
