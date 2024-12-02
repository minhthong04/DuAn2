<div class="navbar-bg"></div>
{{-- Navbar start --}}
@include('admin.layouts.navbar')
{{-- Navbar end --}}
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Admin</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a href="{{ route('admin_dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>

            <li class=""><a class="nav-link" href="{{ route('category-list') }}"><i class="fas fa-list"></i>
                    <span>Category</span></a></li>

            <li class=""><a class="nav-link" href="{{ route('news-list') }}""><i class="fas fa-newspaper"></i>
                    <span>News</span></a></li>


            <li class="dropdown
                ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-shield"></i>
                    <span>Access Management</span></a>
                <ul class="dropdown-menu">

                    <li class=""><a class="nav-link" href="#">Role Users</a></li>

                    <li class=""><a class="nav-link" href="#">Permissions</a>
                    </li>
                </ul>
            </li>


        </ul>
    </aside>
</div>
