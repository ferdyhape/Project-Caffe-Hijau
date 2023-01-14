<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center btn btn-light justify-content-center my-3 mx-3 py-2"
        href="{{ url('dashboard') }}">
        <img src="{{ asset('assets/corp-assets/logo/Logo2.png') }}" alt="" width="60" height="60">
        <div class="sidebar-brand-text text-start mx-2 text-success">Brownies Santri</div>
    </a>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($title === 'Dashboard' ? 'active' : '' ) }}">
        <a class="nav-link py-2 ps-4" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ ($title === 'Item Management' ? 'active' : '' ) }}">
        <a class="nav-link py-2 ps-4" href="{{ url('dashboard/item') }}">
            <i class="fas fa-fw fa-mug-saucer"></i>
            <span>Items</span></a>
    </li>

    <li class="nav-item {{ ($title === 'Category Management' ? 'active' : '' ) }}">
        <a class="nav-link py-2 ps-4" href="{{ url('dashboard/category') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Categories</span></a>
    </li>
    <li class="nav-item {{ ($title === 'Banner Management' ? 'active' : '' ) }}">
        <a class="nav-link py-2 ps-4" href="{{ url('dashboard/banner') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Banner</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-1">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link py-2 ps-4 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ url('dashboard/buttons')}}">Buttons</a>
                <a class="collapse-item" href="{{ url('dashboard/cards')}}">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link py-2 ps-4 collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ url('dashboard/utilities-color')}}">Colors</a>
                <a class="collapse-item" href="{{ url('dashboard/utilities-border')}}">Borders</a>
                <a class="collapse-item" href="{{ url('dashboard/utilities-animation')}}">Animations</a>
                <a class="collapse-item" href="{{ url('dashboard/utilities-other')}}">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link py-2 ps-4 collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{ url('dashboard/login')}}">Login</a>
                <a class="collapse-item" href="{{ url('dashboard/register')}}">Register</a>
                <a class="collapse-item" href="{{ url('dashboard/forgot-password')}}">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="{{ url('dashboard/404')}}">404 Page</a>
                <a class="collapse-item" href="{{ url('dashboard/blank')}}">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link py-2 ps-4" href="{{ url('dashboard/charts')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link py-2 ps-4" href="{{ url('dashboard/table') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->