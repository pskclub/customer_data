<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>DT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Customer Data</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        <form action="#" method="get" class="navbar-form navbar-left">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="ค้นหา...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li>
                    <!-- Menu toggle button -->
                    <a href="{{ url('dashboard') }}">
                        <i class="fa fa-home"></i> Home
                    </a>

                </li>
                <li>
                    <!-- Menu toggle button -->
                    <a href="{{ url('dashboard/customer/add') }}">
                        <i class="fa fa-user-plus"></i> Add Customer
                    </a>

                </li>
                <li>
                    <!-- Menu toggle button -->
                    <a href="{{ url('logout') }}">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>

                </li>


            </ul>
        </div>
    </nav>
</header>
