<section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('img/logo.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->email }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
        <li class="treeview {{ Request::is('admin/company') || Request::is('admin/company/*') ? 'active menu-open' : '' }}" style="height: auto;">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>companies</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="">
                <li class="{{ Request::is('admin/company/create') ? 'active' : '' }}"><a href="{{route('company.create')}}"><i class="fa fa-circle-o"></i> company create </a></li>
                <li class="{{ Request::is('admin/company') ? 'active' : '' }}"><a href="{{route('company.index')}}"><i class="fa fa-circle-o"></i> company list </a></li>
            </ul>
        </li>

        <li class="treeview {{ Request::is('admin/employee') || Request::is('admin/employee/*') ? 'active menu-open' : '' }}" style="height: auto;">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>employee</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu" style="">
                <li class="{{ Request::is('admin/employee/create') ? 'active' : '' }}"><a href="{{route('employee.create')}}"><i class="fa fa-circle-o"></i> employee create </a></li>
                <li class="{{ Request::is('admin/employee') ? 'active' : '' }}"><a href="{{route('employee.index')}}"><i class="fa fa-circle-o"></i> employee list </a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:" id="logout">
                <i class="fa  fa-unlock-alt"></i> <span> Log out </span>
            </a>
        </li>

    </ul>
</section>