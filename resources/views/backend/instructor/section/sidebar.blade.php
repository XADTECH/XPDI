 <!--sidebar wrapper -->

 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


 <div class="sidebar-wrapper" data-simplebar="true" id="sidebarWrapper">
     <div class="sidebar-header ps-5">
         <div class="d-flex justify-content-between align-items-center">
             <img src="{{ asset('frontend_assets/images/logo-2.png') }}" class="logo-icon" alt="logo icon">

             {{-- Close button for small devices --}}
             <button type="button" class="btn d-lg-none d-md-block" id="sidebarCloseBtn" style="font-size: 20px;">
                 <i class="bi bi-x"></i> {{-- Bootstrap Icon, cleaner than font-awesome 'fa-cross' --}}
             </button>
         </div>
         <div>
         </div>
     </div>
     <!--navigation-->
     <ul class="metismenu" id="menu">
         <li class="mb-3">
             <a href="{{ url('/instructor/dashboard') }}"
                 class="d-flex align-items-center px-3 py-2 rounded text-decoration-none">
                 <i class="bi bi-speedometer2 me-2"></i>
                 <span>Dashboard</span>
             </a>
         </li>
         <li class="mb-3">
             <a href="{{ url('/instructor/course') }}" class="d-flex align-items-center px-3 py-2 text-decoration-none">
                 <i class="bi bi-list-task me-2"></i>
                 <span>Managed courses</span>
             </a>
         </li>
         <li class="mb-3">
             <a href="#" class="d-flex align-items-center px-3 py-2 text-decoration-none">
                 <i class="bi bi-heart me-2"></i>
                 <span>Manage Reviews</span>
             </a>
         </li>
         <li class="mb-3">
             <a href="{{ url('/instructor/chat') }}" class="d-flex align-items-center px-3 py-2 text-decoration-none">
                 <i class="bi bi-chat-dots me-2"></i>
                 <span>Inbox</span>
             </a>
         </li>
         <li>
             <a href="{{ url('/instructor/profile') }}"
                 class="d-flex align-items-center px-3 py-2 text-decoration-none">
                 <i class="bi bi-person me-2"></i>
                 <span>My profile</span>
             </a>
         </li>

     </ul>
     <!--end navigation-->


     <script>
         $(document).ready(function() {
             $('#sidebarCloseBtn').on('click', function() {
                 $('#sidebarWrapper').css('display', 'none');
             });
             $('.bx-menu').on('click', function() {
                 $('#sidebarWrapper').css('display', 'block');
             });


             $('ul#menu li').removeClass('mm-active');


         });
     </script>

 </div>
 <!--end sidebar wrapper -->
