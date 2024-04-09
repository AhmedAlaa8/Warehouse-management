    @if (isRouteNamed("admin.cart.index")
        || isRouteNamed("admin.cart.archive")
        || isRouteNamed("admin.cart.create")
        || isRouteNamed("admin.cart.edit")
        || isRouteNamed("admin.cart.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-shopping-cart nav-icon cart"></i>
            <p>
                عربة التسوق
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-shopping-cart nav-icon cart"></i>
            <p>
                عربة التسوق 
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.cart.index")
                || isRouteNamed("admin.cart.create")
                || isRouteNamed("admin.cart.edit")
            )
                <a href="{{ route('admin.cart.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.cart.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.cart.archive"))
                <a href="{{ route('admin.cart.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.cart.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.order.createOrderPage"))
                <a href="{{ route('admin.order.createOrderPage') }}" class="nav-link bg-brimary active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>عمل اوردر</p>
                </a>
            @else
                <a href="{{ route('admin.order.createOrderPage') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>عمل اوردر</p>
                </a>
            @endif
        </li>
    </ul>
</li>