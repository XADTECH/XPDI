 <!--start header -->
 <header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#SearchModal">
                <input class="form-control px-5" disabled type="search" placeholder="Search">
                <span
                    class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                        class='bx bx-search'></i></span>
            </div>


            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>

                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>



                    <li class="nav-item dropdown dropdown-large" style="display: none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                            href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-badge">8 New</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{asset('backend/assets/images/avatars/avatar-1.png')}}" class="msg-avatar"
                                                alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Daisy Anderson<span
                                                    class="msg-time float-end">5 sec
                                                    ago</span></h6>
                                            <p class="msg-info">The standard chunk of lorem</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large" style="display: none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count">8</span>
                            <i class='bx bx-shopping-bag'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">My Cart</p>
                                    <p class="msg-header-badge">10 Items</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="position-relative">
                                            <div class="cart-product rounded-circle bg-light">
                                                <img src="{{asset('backend/assets/images/products/11.png')}}" class=""
                                                    alt="product image">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
                                            <p class="cart-product-price mb-0">1 X $29.00</p>
                                        </div>
                                        <div class="">
                                            <p class="cart-price mb-0">$250</p>
                                        </div>
                                        <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                        </div>
                                    </div>
                                </a>

                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    <img id="" src="{{  auth()->user()->photo ? asset(auth()->user()->photo) :  asset('backend/assets/images/avatars/avatar-2.png')}}" alt="Admin" class="user-img">
                    <div class="user-info">
                        <p class="user-name mb-0">{{auth()->user()->name}}</p>
                        <p class="designattion mb-0">{{auth()->user()->role}}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.profile')}}"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.setting')}}"><i
                                class="bx bx-cog fs-5"></i><span>Settings</span></a>
                    </li>


                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                <i class="bx bx-log-out-circle"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
