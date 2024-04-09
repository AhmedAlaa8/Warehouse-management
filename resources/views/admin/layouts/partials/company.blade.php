    @if (isRouteNamed("admin.company.index")
        || isRouteNamed("admin.company.archive")
        || isRouteNamed("admin.company.create")
        || isRouteNamed("admin.company.edit")
        || isRouteNamed("admin.company.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-building nav-icon company"></i>
            <p>
                الشركات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-building nav-icon company"></i>
            <p>
                الشركات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.company.index")
                || isRouteNamed("admin.company.create")
                || isRouteNamed("admin.company.edit")
            )
                <a href="{{ route('admin.company.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.company.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.company.archive"))
                <a href="{{ route('admin.company.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.company.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
    </ul>
</li>