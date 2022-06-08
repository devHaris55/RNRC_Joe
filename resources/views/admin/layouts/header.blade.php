@php
function active($current_page)
{
    $url = Request::segment(2);
    if ($current_page == $url) {
        echo 'active'; //class name in css
    }
}
@endphp

<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-md-none">
    <a class="navbar-brand mr-lg-5" href="#">
        <img class="navbar-brand-dark" src="{{ asset('admin/assets/img/brand/light.svg') }}" alt="Volt logo" /> <img
            class="navbar-brand-light" src="{{ asset('admin/assets/img/brand/dark.svg') }}" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container-fluid bg-soft">
    <div class="row">
        <div class="col-12">

            <nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
                <div class="sidebar-inner px-4 pt-3">
                    <div
                        class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                        <div class="d-flex align-items-center">
                            <!-- <div class="user-avatar lg-avatar mr-4">
            <img src="{{ asset('admin/assets/img/team/profile-picture-3.jpg') }}" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
          </div> -->
                            <div class="d-block">
                                <!-- <h2 class="h6">Hi, Jane</h2> -->
                                <a href="{{ route('admin_logout') }}" class="btn btn-secondary text-dark btn-xs"><span
                                        class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Sign
                                    Out</a>
                            </div>
                        </div>
                        <div class="collapse-close d-md-none">
                            <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse"
                                data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                                aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item  {{ active('dashboard') }} ">
                            <a href="{{ route('admin_dashboard') }}" class="nav-link">
                                <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ active('admin-list') . active('assigned-add') . active('assigned-edit') }}">
                            <a href="{{ route('admin_users') }}" class="nav-link">
                                <span class="sidebar-icon"><span class="far fa-images"></span></span>
                                <span>User</span>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ active('assigned-list') . active('assigned-add') . active('assigned-edit') }}">
                            <a href="{{ route('admin_assigned') }}" class="nav-link">
                                <span class="sidebar-icon"><span class="far fa-images"></span></span>
                                <span>Assign Conflict Requests</span>
                            </a>
                        </li>
                        <li
                            class="nav-item {{ active('rejected-list') . active('assigned-add') . active('assigned-edit') }}">
                            <a href="{{ route('admin_rejected') }}" class="nav-link">
                                <span class="sidebar-icon"><span class="far fa-images"></span></span>
                                <span>Rejected Conflict Requests</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item {{ active('un_assigned-list') . active('un_assigned-add') . active('un_assigned-edit') }}">
          <a href="{{ route('admin_un_assigned') }}" class="nav-link">
              <span class="sidebar-icon"><span class="far fa-images"></span></span>
              <span>Un-Assign Appointment</span>
          </a>
        </li> -->
                        <!-- <li class="nav-item {{ active('cancelled-list') . active('cancelled-add') . active('cancelled-edit') }}">
          <a href="{{ route('admin_cancelled') }}" class="nav-link">
              <span class="sidebar-icon"><span class="far fa-images"></span></span>
              <span>Cancelled Conflict Requests</span>
          </a>
        </li> -->
                        <li
                            class="nav-item {{ active('calendar-list') . active('calendar-add') . active('calendar-edit') }}">
                            <a href="{{ route('admin_calendar') }}" class="nav-link">
                                <span class="sidebar-icon"><span class="far fa-images"></span></span>
                                <span>Calendar Events</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item {{ active('banner-list') . active('banner-add') . active('banner-edit') }}">
          <a href="{{ route('admin_banners') }}" class="nav-link">
              <span class="sidebar-icon"><span class="far fa-images"></span></span>
              <span>Banners</span>
          </a>
        </li>
        <li class="nav-item {{ active('blog-list') . active('blog-add') . active('blog-edit') }} ">
          <a href="{{ route('admin_blogs') }}" class="nav-link">
              <span class="sidebar-icon"></i><span class="fas fa-blog"></span></span>
              <span>Blogs</span>
          </a>
        </li>
        <li class="nav-item {{ active('testimonial-list') . active('testimonial-add') . active('testimonial-edit') }}">
            <a href="{{ route('admin_testimonials') }}" class="nav-link">
                <span class="sidebar-icon"><span class="fas fa-window-restore"></span></span>
                <span>Testimonials</span>
            </a>
        </li>
          <li class="nav-item {{ active('service-list') . active('service-add') . active('service-edit') }}">
              <a href="{{ route('admin_services') }}" class="nav-link">
                  <span class="sidebar-icon"><span class="fas fa-clipboard-check"></span></span>
                  <span>Services</span>
              </a>
          </li>
        <li class="nav-item {{ active('user-list') . active('user-add') . active('user-edit') }}">
            <a href="{{ route('admin_users') }}" class="nav-link">
                <span class="sidebar-icon"><span class="fas fa-users"></span></span>
                <span>Users</span>
            </a>
        </li>
        <li class="nav-item {{ active('categories-list') . active('categories-add') . active('categories-edit') . active('sub-categories-list') . active('sub-categories-add') . active('sub-categories-edit') . active('products-list') . active('products-add') . active('products-edit') }}">
          <span class="nav-link  collapsed  d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#submenu-pages">
            <span>
              <span class="sidebar-icon"><span class="far fa-file-alt"></span></span>
              Product Details
            </span>
            <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
          </span>
          <div class="multi-level collapse " role="list" id="submenu-pages" aria-expanded="false">
              <ul class="flex-column nav">
                  <li class="nav-item {{ active('categories-list') . active('categories-add') . active('categories-edit') }}"><a class="nav-link" href="{{ route('admin_categories') }}"><i class="fas fa-bars"></i><span> Categories</span></a></li>
                  <li class="nav-item {{ active('sub-categories-list') . active('sub-categories-add') . active('sub-categories-edit') }}"><a class="nav-link" href="{{ route('admin_sub_categories') }}"><i class="fas fa-bars"></i><span> Sub-Categories</span></a></li>
                  <li class="nav-item {{ active('products-list') . active('products-add') . active('products-edit') }}"><a class="nav-link" href="{{ route('admin_products') }}"><i class="fas fa-box-open"></i><span> Products</span></a></li>
              </ul>
          </div>
        </li> -->

                        <li role="separator" class="dropdown-divider mt-4 mb-3 border-black"></li>

                        <li class="nav-item">
                            <a href="{{ route('admin_logout') }}" class="nav-link d-flex align-items-center">
                                <span class="sidebar-icon">
                                    <span class="fas fa-sign-out-alt text-danger"> </span>
                                </span>
                                <span class="">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
