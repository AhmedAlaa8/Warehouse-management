    @if (isRouteNamed("admin.product.index")
        || isRouteNamed("admin.product.archive")
        || isRouteNamed("admin.product.create")
        || isRouteNamed("admin.product.edit")
        || isRouteNamed("admin.product.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-cubes nav-icon product"></i>
            <p>
                المنتجات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-cubes nav-icon product"></i>
            <p>
                المنتجات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.product.index")
                || isRouteNamed("admin.product.create")
                || isRouteNamed("admin.product.edit")
            )
                <a href="{{ route('admin.product.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.product.archive"))
                <a href="{{ route('admin.product.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.product.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
    </ul>
</li>