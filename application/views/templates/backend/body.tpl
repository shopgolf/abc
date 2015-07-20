<body class="skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{$link_bk}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Control</b> Admin</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <!-- User Image -->
                                                    <img src="{{'static/templates/backend/images/user3-128x128.jpg'|base_url}}" class="img-circle" alt="User Image" />
                                                </div>
                                                <!-- Message title and timestamp -->
                                                <h4>Support Team
                                                  <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <!-- The message -->
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                    </ul>
                                    <!-- /.menu -->
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->

                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start notification -->
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <!-- end notification -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks Menu -->
                        <li class="dropdown tasks-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- Inner menu: contains the tasks -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <!-- Task title and progress text -->
                                                <h3>Design some buttons
                                                  <small class="pull-right">20%</small>
                                                </h3>
                                                <!-- The progress bar -->
                                                <div class="progress xs">
                                                    <!-- Change the css width attribute to simulate progress -->
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{$static_bk}}/images/user2-160x160.jpg" class="user-image" alt="User Image" />
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{$static_bk}}/images/user3-128x128.jpg" class="img-circle" alt="User Image" />
                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{$static_bk}}/images/user3-128x128.jpg" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>{{$userinfo->username}}</p>
                        <!-- Status -->
                        <a href="userInfo.html"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..." />
                        <span class="input-group-btn">
                          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">{{$site_url}}</li>
                    <!-- Optionally, you can add icons to the links -->

                    <li class="active">
                        <a href="{{$link_bk}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-bar-chart pull-right"></i>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>{{$lang.product}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{$link_bk}}/product/index/add.html"><i class="glyphicon glyphicon-info-sign"></i> Thêm mới</a></li>
                            <li><a href="{{$link_bk}}/product.html"><i class="glyphicon glyphicon-list-alt text-info"></i> List sản phẩm</a></li>
                            <li><a href="{{$link_bk}}/deal.html"><i class="glyphicon glyphicon-list-alt text-info"></i> Khuyến Mãi</a></li>
                            <li><a href="{{$link_bk}}/soldout.html"><i class="glyphicon glyphicon-list-alt text-info"></i> Hết hàng</a></li>
                            <li><a href="{{$link_bk}}/hotdeal.html"><i class="glyphicon glyphicon-list-alt text-info"></i> Mua nhiều</a></li>
                            <li><a href="{{$link_bk}}/bid.html"><i class="glyphicon glyphicon-list-alt text-info"></i> Sản phẩm đang đâu giá</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>{{$lang.bid}} {{$lang.product}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="sanpham_daugia.html"><i class="glyphicon glyphicon-list-alt text-info"></i> Đang đấu giá</a></li>
                            <li><a href="sanpham_daugia_ht.html"><i class="glyphicon glyphicon-list-alt text-info"></i> Hoàn thành phiên đấu giá</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>Đơn hàng</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="donhang.html"><i class="glyphicon glyphicon-info-sign"></i> Đơn hàng mới</a></li>
                            <li><a href="donhang_hoanthanh.html"><i class="glyphicon glyphicon-check text-success"></i> Đã hoàn thành</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>Danh Mục SP</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="danhmuc_add.html"><i class="glyphicon glyphicon-plus-sign text-success"></i> Thêm danh mục</a></li>
                            <li><a href="danhmuc_list.html"><i class="glyphicon glyphicon-list-alt text-info"></i> List Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>Hãng Sản Xuất</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="hangsx_add.html"><i class="glyphicon glyphicon-plus-sign text-success"></i> Thêm hãng</a></li>
                            <li><a href="hangsx_list.html"><i class="glyphicon glyphicon-list-alt text-info"></i> List hãng</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-cog'></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="hethong.html"><i class="glyphicon glyphicon-info-sign"></i> Hệ thống</a></li>
                            <li><a href="lienhe.html"><i class="glyphicon glyphicon-envelope"></i> Liên hệ</a></li>
                        </ul>
                    </li>
                    <!-- / Config System-->

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>