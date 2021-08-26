<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="{{ url('storage/avatars/'.auth()->user()->avatar) }}" class="img-circle elevation-2"
                    alt="User Image"> -->
            </div>
            <div class="info"></div>
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.appointments') }}"
                        class="nav-link {{ request()->is('admin/appointments') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Appointments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}"
                        class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link {{ request()->is('accstar/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-calculator"></i>
                        <p>
                            AccStar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('accstar.gljournal') }}" 
                                class="nav-link {{ request()->is('accstar/gjournal') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>ใบสำคัญ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accstar.customer') }}" 
                                class="nav-link {{ request()->is('accstar/customer') ? 'active' : '' }}">
                                <i class="nav-icon far fa-address-book"></i>
                                <p>ลูกค้า</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accstar.sodeliverytax') }}" 
                                class="nav-link {{ request()->is('accstar/sodeliverytax') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-shopping-cart"></i>
                                <p>ส่งสินค้าพร้อมใบกำกับ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onClick="event.preventDefault(); this.closest('form').submit();"
                            class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>