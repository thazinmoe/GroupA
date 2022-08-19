<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @auth
    @role('Admin')
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">          
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Manage Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.roles.index') }}">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Manage Roles</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.customers') }}">
                <i class="fas fa-pen-nib"></i>
                <span>Customer Info</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                <i class="fas fa-list-alt"></i>
                <span>Category</span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.travel-packages.index') }}">
                <i class="fas fa-fw fa-hotel"></i>
                <span>Travel Package</span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('admin.cars.index') }}">
                <i class="fas fa-fw fa-car"></i>
                <span>Car</span></a>
        </li>   
    @endrole
    @role('Admin|SubAdmin')
        <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.posts.index') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>Posts</span></a>
        </li>
    @endrole
    @endauth    
    <!-- Divider -->
    <hr class="sidebar-divider">


</ul>