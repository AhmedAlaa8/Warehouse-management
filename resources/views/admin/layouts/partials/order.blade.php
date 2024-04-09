    @if (isRouteNamed("admin.order.index")
        || isRouteNamed("admin.order.archive")
        || isRouteNamed("admin.order.create")
        || isRouteNamed("admin.order.edit")
        || isRouteNamed("admin.order.show")
    )
    <li class="nav-item menu-open">
        <a href="#" class="nav-link bg-white">
            <i class="fas fa-phone-volume nav-icon order"></i>
            <p>
                الأوردرات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @else
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-phone-volume nav-icon order"></i>
            <p>
                الأوردرات
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    @endif
    
    <ul class="nav nav-treeview">
        <li class="nav-item">
            @if (isRouteNamed("admin.order.index")
                || isRouteNamed("admin.order.create")
                || isRouteNamed("admin.order.edit")
            )
                <a href="{{ route('admin.order.index') }}" class="nav-link bg-mt active">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @else
                <a href="{{ route('admin.order.index') }}" class="nav-link">
                    <i class="fas fa-table nav-icon"></i>
                    <p>الجدول الرئيسي</p>
                </a>
            @endif
        </li>
    </ul>
</li>