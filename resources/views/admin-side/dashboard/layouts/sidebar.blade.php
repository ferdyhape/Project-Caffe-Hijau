<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center btn btn-light justify-content-center my-3 mx-3 py-2"
        href="{{ url('dashboard') }}">
        <img src="{{ asset('assets/corp-assets/logo/logo4.png') }}" alt="" width="75%">
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($title === 'Dashboard' ? 'active' : '' ) }}">
        <a class="nav-link py-2 px-4" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ ($title === 'Item Management' ? 'active' : '' ) }}">
        <a class="nav-link py-2 px-4" href="{{ url('dashboard/item') }}">
            <i class="fas fa-fw fa-mug-saucer"></i>
            <span>Items</span></a>
    </li>

    <li class="nav-item {{ ($title === 'Category Management' ? 'active' : '' ) }}">
        <a class="nav-link py-2 px-4" href="{{ url('dashboard/category') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item {{ ($title === 'Banner Management' ? 'active' : '' ) }}">
        <a class="nav-link py-2 px-4" href="{{ url('dashboard/banner') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Banner</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block my-4">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->