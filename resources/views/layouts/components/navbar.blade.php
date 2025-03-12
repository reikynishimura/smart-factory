

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span>{{ Auth::user()->name ?? 'Guest' }}</span>
                <i class="fas fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('login') }}" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>
