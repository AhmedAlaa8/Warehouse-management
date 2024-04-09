    @if (isRouteNamed("admin.user.index")
        || isRouteNamed("admin.user.archive")
        || isRouteNamed("admin.user.create")
        || isRouteNamed("admin.user.edit")
        || isRouteNamed("admin.user.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-user nav-icon user"></i>
            <p>
                المستخدمين
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-user nav-icon user"></i>
            <p>
                المستخدمين
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.user.index")
                || isRouteNamed("admin.user.create")
                || isRouteNamed("admin.user.edit")
            )
                <a href="{{ route('admin.user.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.user.archive"))
                <a href="{{ route('admin.user.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.user.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
    </ul>
</li>