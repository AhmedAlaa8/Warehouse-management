    @if (isRouteNamed("admin.supplier.index")
        || isRouteNamed("admin.supplier.archive")
        || isRouteNamed("admin.supplier.create")
        || isRouteNamed("admin.supplier.edit")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-shuttle-van nav-icon supplier"></i>
            <p>
                الموردين
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-shuttle-van nav-icon supplier"></i>
            <p>
                الموردين
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.supplier.index")
                || isRouteNamed("admin.supplier.create")
                || isRouteNamed("admin.supplier.edit")
            )
                <a href="{{ route('admin.supplier.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.supplier.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.supplier.archive"))
                <a href="{{ route('admin.supplier.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.supplier.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
    </ul>
</li>