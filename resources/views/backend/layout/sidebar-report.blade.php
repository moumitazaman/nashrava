
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
          <a href="#" class="d-block">Report Module</a>
        </div>
      </div>
     @if(Request::is('admin*'))
      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview @if (Request::is('admin/purchase/daily/report') || Request::is('admin/stock/report') || Request::is('admin/invoice/daily/report') || Request::is('admin/local/invoice/daily/report'))
           menu-open
          @endif" id="side_report" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p style="color:#ffffff;">
               All Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('purchase.report')}}" class="nav-link {{ Request::is('admin/purchase/daily/report') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">Purchase Report</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('stock.report')}}" class="nav-link {{ Request::is('admin/stock/report') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">Stock Report</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('invoice.report')}}" class="nav-link {{ Request::is('admin/invoice/daily/report') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">Selling Report</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('local.invoice.report')}}" class="nav-link {{ Request::is('admin/local/invoice/daily/report') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">Local Selling Report</p>
                </a>
              </li>
            </ul>
               <ul class="nav nav-treeview">
                   <li class="nav-item ">
                       <a href="{{route('local.due.daily.report')}}" class="nav-link {{ Request::is('admin/local/customer/daily/due/report') ? 'active' : '' }}">
                           <i class="far fa-circle nav-icon"></i>
                           <p style="color:#faf619;">Due Report</p>
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
