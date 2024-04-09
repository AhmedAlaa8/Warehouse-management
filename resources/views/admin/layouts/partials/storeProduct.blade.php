    @if (isRouteNamed("admin.storeProduct.index")
        || isRouteNamed("admin.storeProduct.archive")
        || isRouteNamed("admin.storeProduct.create")
        || isRouteNamed("admin.storeProduct.edit")
        || isRouteNamed("admin.storeProduct.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-box nav-icon storeProduct"></i>
            <p>
                منتجات المخازن
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-box nav-icon storeProduct"></i>
            <p>
                منتجات المخازن
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.storeProduct.index")
                || isRouteNamed("admin.storeProduct.create")
                || isRouteNamed("admin.storeProduct.edit")
            )
                <a href="{{ route('admin.storeProduct.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.storeProduct.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.storeProduct.archive"))
                <a href="{{ route('admin.storeProduct.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.storeProduct.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
    </ul>
</li>