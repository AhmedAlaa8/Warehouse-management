    @if (isRouteNamed("admin.productUnit.index")
        || isRouteNamed("admin.productUnit.archive")
        || isRouteNamed("admin.productUnit.create")
        || isRouteNamed("admin.productUnit.edit")
        || isRouteNamed("admin.productUnit.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-weight nav-icon productUnit"></i>
            <p>
                وحدات المنتجات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-weight nav-icon productUnit"></i>
            <p>
                وحدات المنتجات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.productUnit.index")
                || isRouteNamed("admin.productUnit.create")
                || isRouteNamed("admin.productUnit.edit")
            )
                <a href="{{ route('admin.productUnit.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.productUnit.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.productUnit.archive"))
                <a href="{{ route('admin.productUnit.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.productUnit.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
    </ul>
</li>