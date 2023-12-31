<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Dashboard Admin Mahesa</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown ">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ Route('dashboard') }}">Dashboard</a>
                    </li>
                    
                </ul>
            </li>


            <li class="menu-header">Users</li>
            <li class="nav-item dropdown ">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
                <ul class="dropdown-menu">

                    <li class='{{ Request::is('user.index') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('user.index') }}">All User</a>
                    </li>
                    
                </ul>
            </li>

            <li class="menu-header">Products</li>
            <li class="nav-item dropdown ">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Products</span></a>
                <ul class="dropdown-menu">

                    <li class='{{ Request::is('products.index') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ route('products.index') }}">Products</a>
                    </li>
                    
                </ul>
            </li>
        </ul>
    </aside>
</div>
