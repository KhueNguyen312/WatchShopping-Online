<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{Auth::guard('admin')->user()->img}}" style="width: 40px;height: 40px;" class="img-circle " alt="User Image">
                </div>
                <?php
//                if (Auth::check()==true)
//                    $id = Auth::id();
//                else
//                    $id = 0;
                    //$id = $user->id
                ?>
                <div class="pull-left info">
                    <p>{{Auth::guard('admin')->user()->name}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{route('ad.contact.get')}}">
                        <i class="fa fa-dashboard"></i> <span>Feedback</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Products Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('ad.product.list.get')}}"><i class="fa fa-circle-o"></i>Products</a></li>
                        <li><a href="{{route('ad.attribute.list.get')}}"><i class="fa fa-circle-o"></i>Attributes</a></li>
                        <li><a href="{{route('ad.brand.list.get')}}"><i class="fa fa-circle-o"></i>Brands</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('ad.invoice.list.get')}}">
                        <i class="fa fa-book"></i> <span>Invoices Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('ad.coupon.list.get')}}">
                        <i class="fa fa-ticket"></i> <span>Coupons Management</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Reports</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('ad.report.get')}}"><i class="fa fa-circle-o"></i>Sales Report</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>User Management</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('ad.user.profile',[Auth::guard('admin')->user()->id])}}"><i class="fa fa-circle-o"></i>Profile</a></li>
                        <li><a href="{{route('ad.user.list.get')}}"><i class="fa fa-circle-o"></i>Admin</a></li>
                        <li><a href="{{route('ad.customer.list.get')}}"><i class="fa fa-circle-o"></i>Customer Management</a></li>
                    </ul>
                </li>
                <li><a href="{{route('index.home.get')}}"><i class="fa fa-book"></i> <span>Home Page</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="{{route('ad.logout')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Log out</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

