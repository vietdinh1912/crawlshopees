<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TEA WORK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Members Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('users.index') }}" data-toggle="collapse" data-target="#collapseMembers"
           aria-expanded="true" aria-controls="collapseMembers">
            <i class="fas fa-fw fa-users"></i>
            <span>Members</span>
        </a>
        <div id="collapseMembers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('users.index') }}">List</a>
                <a class="collapse-item" href="/">New</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Forums Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('articles.index') }}" data-toggle="collapse" data-target="#collapseForums"
           aria-expanded="true" aria-controls="collapseForums">
            <i class="fas fa-fw fa-comment"></i>
            <span>Forums</span>
        </a>
        <div id="collapseForums" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Articles:</h6>
                <a class="collapse-item" href="{{ route('articles.index') }}">List</a>
                <a class="collapse-item" href="">New</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Roles -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Roles & Permissions</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
