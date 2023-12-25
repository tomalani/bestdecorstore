 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
     navbar-scroll="true">
     <div class="container-fluid py-1 px-3">
         <nav aria-label="breadcrumb">
             <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                 <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                 </li>
                 @if (Request::is('backend/products'))
                     <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Products</li>
                 @endif

                 @if (Request::is('backend/categories*'))
                     <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categories</li>
                 @endif

                 @if (Request::is('backend/users*'))
                     <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
                 @endif
                 @if (Request::is('backend/orders*'))
                     <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Orders</li>
                 @endif

             </ol>
             @if (Request::is('backend/products'))
                 <h6 class="font-weight-bolder mb-0">Products</h6>
             @endif

             @if (Request::is('backend/categories*'))
                 <h6 class="font-weight-bolder mb-0">Categories</h6>
             @endif

             @if (Request::is('backend/users*'))
                 <h6 class="font-weight-bolder mb-0">Users</h6>
             @endif

             @if (Request::is('backend/orders*'))
                 <h6 class="font-weight-bolder mb-0">Orders</h6>
             @endif

         </nav>

         <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
             <div class="ms-md-auto pe-md-3 d-flex align-items-center">
             </div>
             <ul class="navbar-nav  justify-content-end">
                 <li class="nav-item dropdown pe-2 d-flex align-items-center">
                     <a href="javascript:;" class="nav-link text-body font-weight-bold px-0" id="dropdownMenuButton"
                         data-bs-toggle="dropdown" aria-expanded="false">
                         <i class="fa fa-user me-sm-1"></i>
                         <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                     </a>
                     <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                         aria-labelledby="dropdownMenuButton">
                         <li class="mb-2">
                             <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <p class="text-xs text-secondary mb-0 ">
                                     <svg class="me-1" xmlns="http://www.w3.org/2000/svg" height="16"
                                         width="16"
                                         viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                         <path
                                             d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                     </svg>
                                     Logout
                                 </p>
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                 style="display: none;">
                                 @csrf
                             </form>
                         </li>
                     </ul>
                 </li>

             </ul>
         </div>
     </div>
 </nav>
