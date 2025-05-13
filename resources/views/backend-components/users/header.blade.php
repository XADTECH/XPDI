 <header class="top-bar d-flex align-items-center justify-content-between px-4">
     <!-- Hamburger (only on small) -->
     <button class="btn btn-outline-secondary d-lg-none me-3" type="button" data-bs-toggle="collapse"
         data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
         <i class="bi bi-list fs-3"></i>
     </button>

     <h5 class="mb-0 fw-semibold">
         Hello, <span class="fw-normal">{{ auth()->user()->name }}</span>
     </h5>

     <div class="d-flex align-items-center gap-3">
         <button class="btn position-relative p-0 border-0 bg-transparent">
             <i class="bi bi-bell fs-4"></i>
             <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-accent">
                 6
             </span>
         </button>
         <div class="dropdown">
             <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                 data-bs-toggle="dropdown">
                 <img src="{{ asset('frontend_assets/images/about/frame.png') }}" alt="avatar" width="40"
                     height="40" class="rounded-circle object-fit-cover">
             </a>
             <ul class="dropdown-menu dropdown-menu-end">
                 <li><a class="dropdown-item" href="#">Account settings</a></li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li><a class="dropdown-item" href="{{ url('/') }}">Logout</a></li>
             </ul>
         </div>
     </div>
 </header>
