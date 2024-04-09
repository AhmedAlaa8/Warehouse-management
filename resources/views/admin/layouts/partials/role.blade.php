    @if (isRouteNamed("admin.role.index")
        || isRouteNamed("admin.role.archive")
        || isRouteNamed("admin.role.create")
        || isRouteNamed("admin.role.edit")
        || isRouteNamed("admin.role.show")
        || isRouteNamed("admin.permission.index")
        || isRouteNamed("admin.permission.addRoleUserPage")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-user-tag role nav-icon"></i>
            <p>
                 الأدوار
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-user-tag role nav-icon"></i>
            <p>
                 الأدوار
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.role.index")
                || isRouteNamed("admin.role.create")
                || isRouteNamed("admin.role.edit")
            )
                <a href="{{ route('admin.role.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.role.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.role.archive"))
                <a href="{{ route('admin.role.archive') }}" class="nav-link bg-archive active">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @else
                <a href="{{ route('admin.role.archive') }}" class="nav-link">
                    <i class="fas fa-file-archive nav-icon"></i>
                    <p>الأرشيف</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.permission.index"))
                <a href="{{ route('admin.permission.index') }}" class="nav-link bg-permission active">
                    <i class="fas fa-pencil-ruler nav-icon"></i>
                    <p>صلاحيات الأدوار</p>
                </a>
            @else
                <a href="{{ route('admin.permission.index') }}" class="nav-link">
                    <i class="fas fa-pencil-ruler nav-icon"></i>
                    <p>صلاحيات الأدوار</p>
                </a>
            @endif
        </li>
        <li class="nav-item">
            @if (isRouteNamed("admin.permission.addRoleUserPage"))
                <a href="{{ route('admin.permission.addRoleUserPage') }}" class="nav-link bg-roleUser active">
                    <i class="fas fa-user-astronaut nav-icon"></i>
                    <p>أدوار المستخدمين</p>
                </a>
            @else
                <a href="{{ route('admin.permission.addRoleUserPage') }}" class="nav-link">
                    <i class="fas fa-user-astronaut nav-icon"></i>
                    <p>أدوار المستخدمين</p>
                </a>
            @endif
        </li>
    </ul>
</li>