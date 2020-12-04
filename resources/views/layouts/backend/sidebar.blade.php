<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aminous <sup>IND</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Role Admin -->
    <li class="nav-item {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ (request()->segment(1) == 'group') ? 'active' : '' }} {{ (request()->segment(1) == 'category') ? 'active' : '' }} {{ (request()->segment(1) == 'subcategory') ? 'active' : '' }} {{ (request()->segment(1) == 'product') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Data</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data:</h6>
                <a class="collapse-item {{ (request()->segment(1) == 'group') ? 'active' : '' }}" href="{{ route('group.index')}}">Group</a>
                <a class="collapse-item {{ (request()->segment(1) == 'category') ? 'active' : '' }}" href="{{ route('category.index')}}">Kategori</a>
                <a class="collapse-item {{ (request()->segment(1) == 'subcategory') ? 'active' : '' }}" href="{{ route('subcategory.index')}}">Sub Kategori</a>
                <a class="collapse-item {{ (request()->segment(1) == 'product') ? 'active' : '' }}" href="{{ route('product.index')}}">Produk</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ (request()->segment(1) == 'role') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('role.index')}}">
            <i class="fas fa-fw fa-lock"></i>
        <span>Role</span>
        </a>
    </li>

    <li class="nav-item {{ (request()->segment(1) == 'user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.index')}}">
            <i class="fas fa-fw fa-user"></i>
        <span>User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>