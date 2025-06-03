<style>
    :root {
        --sidebar-w: 240px;
        --clr-accent: #186d8e;
        --clr-bg-light: #eceae6;
        --clr-sidebar: #ffffff;
        --clr-text: #0f1a35;
        --clr-purple: #e4e0ff;
    }

    .sidebar {
        width: var(--sidebar-w);
        background: var(--clr-sidebar);
    }

    .sidebar {
        min-height: 100vh;
    }


    .sidebar .nav-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        color: var(--clr-text);
        border-radius: 0.375rem;
    }

    .sidebar .nav-link.active {
        background: var(--clr-accent);
        color: #fff;
    }

    .sidebar .logo {
        height: var(--header-h);
        padding: 1rem 1.25rem;
    }

    .top-bar {
        height: var(--header-h);
        background: #fff;
        border-bottom: 1px solid #d8d8d8;
    }
</style>

<nav id="sidebarMenu" class="sidebar collapse collapse-horizontal d-lg-flex flex-column border-end">
    <div class="logo d-flex align-items-center">
        <img src="{{ asset('frontend_assets/images/logo-2.png') }}" alt="xPDI logo" class="img-fluid ps-5">
    </div>

    <ul class="nav flex-column px-2">
        <li class="nav-item">
            <a href="{{ url('/user/dashboard') }}" class="nav-link {{ request()->is('user/dashboard') ? 'active' : '' }}">
                <i class="bi bi-check2-circle"></i>Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('user/profile') }}" class="nav-link {{ request()->is('user/profile') ? 'active' : '' }}">
                <i class="bi bi-person"></i>My profile
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/user/course') }}" class="nav-link {{ request()->is('user/course*') ? 'active' : '' }}">
                <i class="bi bi-list-task"></i>My courses
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('user/wishlist') }}" class="nav-link {{ request()->is('user/wishlist') ? 'active' : '' }}">
                <i class="bi bi-heart"></i>Wishlist
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('user/user-message') }}"
                class="nav-link {{ request()->is('user/user-message') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i>Inbox
            </a>
        </li>
    </ul>
</nav>
