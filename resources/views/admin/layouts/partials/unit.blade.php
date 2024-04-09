    @if (isRouteNamed("admin.unit.index")
        || isRouteNamed("admin.unit.archive")
        || isRouteNamed("admin.unit.create")
        || isRouteNamed("admin.unit.edit")
        || isRouteNamed("admin.unit.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-weight-hanging nav-icon unit"></i>
            <p>
                الوحدات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-weight-hanging nav-icon unit"></i>
            <p>
                الوحدات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.unit.index")
                || isRouteNamed("admin.unit.create")
                || isRouteNamed("admin.unit.edit")
            )
                <a href="{{ route('admin.unit.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.unit.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.unit.archive"))
                <a href="{{ route('admin.unit.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.unit.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
    </ul>
</li>