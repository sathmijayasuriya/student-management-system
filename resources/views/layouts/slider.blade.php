   <aside class="left-sidebar">
       <!-- Sidebar scroll-->
       <div>
           <div class="brand-logo d-flex align-items-center justify-content-between">
               <a href="/" class="text-nowrap logo-img">
                   <img src="{{asset('assets/images/logos/logoweb.png')}}" alt="" width="40" height="auto" />
               </a>
               <div class="close-btn  d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                   <i class="ti ti-x fs-6"></i>
               </div>
           </div>
           <!-- Sidebar navigation-->
           <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
               <ul id="sidebarnav">
                   <li class="nav-small-cap">
                       <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                       <span class="hide-menu">Home</span>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
                           <i class="ti ti-home"></i>
                           <span class="hide-menu">Dashboard</span>
                       </a>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between {{request()->routeIs('students.*')?'active':''}}" href="{{route('students.index')}}" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-books"></i> 
                               </span>
                               <span class="hide-menu">Students</span>
                           </div>

                       </a>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between" href="/" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-arrow-merge-right"></i>
                               </span>
                               <span class="hide-menu">Performance</span>
                           </div>

                       </a>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                           aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-antenna-bars-4"></i> </span>
                               <span class="hide-menu">Attendence</span>
                           </div>
                       </a>
                       <ul aria-expanded="false" class="collapse first-level">
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Homepage</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">About Us</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Blog</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Blog Details</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Contact Us</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Portfolio</span>
                                   </div>

                               </a>
                           </li>
                       </ul>
                   </li>

                   <li>
                       <span class="sidebar-divider lg"></span>
                   </li>
                   <li class="nav-small-cap">
                       <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                       <span class="hide-menu">Teaching management</span>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                           aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-file-time"></i> </span>
                               <span class="hide-menu">Time table</span>
                           </div>

                       </a>
                       <ul aria-expanded="false" class="collapse first-level">
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Shop</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Details</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">List</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Checkout</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Add Product</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Edit Product</span>
                                   </div>

                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                           aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-files"></i>
                               </span>
                               <span class="hide-menu">Tutor Management</span>
                           </div>

                       </a>
                       <ul aria-expanded="false" class="collapse first-level">
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Blog Posts</span>
                                   </div>

                               </a>
                           </li>
                           <li class="sidebar-item">
                               <a class="sidebar-link justify-content-between" href="#">
                                   <div class="d-flex align-items-center gap-3">
                                       <div class="round-16 d-flex align-items-center justify-content-center">
                                           <i class="ti ti-circle"></i>
                                       </div>
                                       <span class="hide-menu">Blog Details</span>
                                   </div>

                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-user-circle"></i>
                               </span>
                               <span class="hide-menu">User Profile</span>
                           </div>

                       </a>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-message-dots"></i>
                               </span>
                               <span class="hide-menu">Chat</span>
                           </div>

                       </a>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-notes"></i>
                               </span>
                               <span class="hide-menu">Notes</span>
                           </div>

                       </a>
                   </li>
                   <li>
                       <span class="sidebar-divider lg"></span>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-brand-google-photos"></i>
                               </span>
                               <span class="hide-menu">Gallery</span>
                           </div>

                       </a>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-help"></i>
                               </span>
                               <span class="hide-menu">FAQ</span>
                           </div>

                       </a>
                   </li>
                   <li class="sidebar-item">
                       <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                           <div class="d-flex align-items-center gap-3">
                               <span class="d-flex">
                                   <i class="ti ti-user-circle"></i>
                               </span>
                               <span class="hide-menu">Account Setting</span>
                           </div>

                       </a>
                   </li>
                     
                   </li>
               </ul>
           </nav>
           <!-- End Sidebar navigation -->
       </div>
       <!-- End Sidebar scroll-->
   </aside>
