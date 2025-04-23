@php
    $menus = [
        (object) [
            "title" => "Home",
            "path" => "home",
            "icon" => "fas fa-home",
        ],
        (object) [
            "title" => "Dashboard",
            "path" => "dashboard",
            "icon" => "nav-icon fas fa-tachometer-alt",
        ],
        (object) [
            "title" => "Project",
            "path" => "projects",
            "icon" => "fas fa-folder",
        ],
        (object) [
            "title" => "Working Sequence",
            "path" => "working_sequences",
            "icon" => "fas fa-cogs",
        ],
        (object) [
            "title" => "User",
            "path" => "user",
            "icon" => "fas fa-id-badge",
        ],
    ];
@endphp


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light"><h4><b>SMART</b>FACTORY 4.0</h4></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                @foreach ($menus as $menu)
                <li class="nav-item">
                    <a href="{{ $menu->path[0] !== '/' ? '/' . $menu->path : $menu->path }}" class="nav-link {{ request()->path() === $menu->path ? 'active' : '' }}">
                    <i class="nav-icon {{ $menu->icon }}"></i>
                    <p>
                        {{ $menu->title }}
                        <!-- <span class="right badge badge-danger">New</span> -->
                    </p>
                    </a>
                </li>
                @endforeach
        </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>