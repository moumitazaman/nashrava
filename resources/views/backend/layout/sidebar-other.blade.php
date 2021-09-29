
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar  elevation-4" style="background-color:#1c1c1c;">
   <!-- Brand Logo -->
    <a href="{{url('/admin/home')}}" class="brand-link" >
      <img src="{{asset('public/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nashrava</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="background-color:#1c1c1c;">
        <div class="image">
          <img src="{{asset('public/backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Others Module</a>
        </div>
      </div>
     @if(Request::is('admin*'))
      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview @if (Request::is('admin/size') || Request::is('admin/size-measurement') || Request::is('admin/coupons') || Request::is('admin/supplier') || Request::is('admin/unit') || Request::is('admin/slider') || Request::is('admin/brand'))
           menu-open
          @endif" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p style="color:#ffffff;">
               {{__('sidebar.manage_others')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('size.index')}}" class="nav-link {{ Request::is('admin/size') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.view_size')}}</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('size-measurement.index')}}" class="nav-link {{ Request::is('admin/size-measurement') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">View Size Measurement</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brand.index')}}" class="nav-link {{ Request::is('admin/brand') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.view_brand')}}</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link {{ Request::is('admin/slider') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">View Slider</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('coupons.index')}}" class="nav-link {{ Request::is('admin/coupons') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.view_coupon')}}</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('supplier.index')}}" class="nav-link {{ Request::is('admin/supplier') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.view_supplier')}}</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('unit.index')}}" class="nav-link {{ Request::is('admin/unit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.view_unit')}}</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
     @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
