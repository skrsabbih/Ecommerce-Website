<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <!-- Sidebar Brand -->
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Dashboard Section -->
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ setActive('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Manage Categories Section -->
            <li class="menu-header">Manage</li>
            <li class="dropdown {{ setActive([
                'admin.category.*',
                'admin.sub-category.*',
                'admin.child-category.*'
            ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Categories</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.category.*']) }}">
                        <a class="nav-link" href="{{ route('admin.category.index') }}">Category</a>
                    </li>
                    <li class="{{ setActive(['admin.sub-category.*']) }}">
                        <a class="nav-link" href="{{ route('admin.sub-category.index') }}">Sub Category</a>
                    </li>
                </ul>
            </li>

            <!-- Manage Products Section -->
            <li class="dropdown {{ setActive(['admin.brand.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-boxes"></i>
                    <span>Manage Products</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.brand.*']) }}">
                        <a class="nav-link" href="{{ route('admin.brand.index') }}">Brands</a>
                    </li>
                </ul>
            </li>

            <!-- Manage Website Slider -->
            <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i>
                    <span>Manage Website</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setActive(['admin.slider.*']) }}">
                        <a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
