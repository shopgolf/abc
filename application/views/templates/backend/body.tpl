<body class="skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{$link_bk}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>{{$lang.control}}</b> {{$lang.admin}}</span>
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

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{$static_bk}}/images/cirlce.png" class="user-image" alt="User Image" />
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{$userinfo->username}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{$static_bk}}/images/cirlce.png" class="user-image" alt="User Image" />
                                    <p>
                                        {{$userinfo->username}}
                                        <small>{{$lang.site_name}}</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{$link_bk}}/home/logout.html" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
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
                        <img src="{{$static_bk}}/images/cirlce.png" class="user-image" alt="User Image" />
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
                            <li><a href="{{$link_bk}}/product/index/add.html"><i class="glyphicon glyphicon-info-sign"></i> {{$lang.add}} {{$lang.product}}</a></li>
                            <li><a href="{{$link_bk}}/product.html"><i class="glyphicon glyphicon-list-alt text-info"></i> {{$lang.list}} {{$lang.product}}</a></li>
                            <li><a href="{{$link_bk}}/promotion.html"><i class="glyphicon glyphicon-list-alt text-info"></i> {{$lang.product_promotion}}</a></li>
                            <li><a href="{{$link_bk}}/soldout.html"><i class="glyphicon glyphicon-list-alt text-info"></i> {{$lang.product_soldout}}</a></li>
                            <li><a href="{{$link_bk}}/hotdeal.html"><i class="glyphicon glyphicon-list-alt text-info"></i> {{$lang.product_hotdeal}}</a></li>
                            <li><a href="{{$link_bk}}/bid.html"><i class="glyphicon glyphicon-list-alt text-info"></i> {{$lang.product_bid}}</a></li>
                            <li><a href="{{$link_bk}}/bid.html"><i class="glyphicon glyphicon-list-alt text-info"></i> {{$lang.product_bided}}</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>{{$lang.cart}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{$link_bk}}/stats.html"><i class="glyphicon glyphicon-info-sign"></i> {{$lang.stats_cart}}</a></li>
                            <li><a href="{{$link_bk}}/ordersuccess.html"><i class="glyphicon glyphicon-check text-success"></i> {{$lang.paid}}</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>Danh Mục SP</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{$link_bk}}/category/index/add.html"><i class="glyphicon glyphicon-plus-sign text-success"></i> Thêm danh mục</a></li>
                            <li><a href="{{$link_bk}}/category.html"><i class="glyphicon glyphicon-list-alt text-info"></i> List Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>Hãng Sản Xuất</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{$link_bk}}/maker/index/add.html"><i class="glyphicon glyphicon-plus-sign text-success"></i> Thêm hãng</a></li>
                            <li><a href="{{$link_bk}}/maker.html"><i class="glyphicon glyphicon-list-alt text-info"></i> Danh sách hãng</a></li>
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="#"><i class='fa fa-building'></i> <span>{{$lang.page_news}}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{$link_bk}}/post/index/add.html"><i class="glyphicon glyphicon-plus-sign text-success"></i> {{$lang.add}} {{$lang.page_news}}</a></li>
                            <li><a href="{{$link_bk}}/post.html"><i class="glyphicon glyphicon-list-alt text-info"></i> {{$lang.list}} {{$lang.page_news}}</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class='fa fa-cog'></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{$link_bk}}/configuration.html"><i class="glyphicon glyphicon-info-sign"></i>{{$lang.menu_configuration}}</a></li>
                            <li><a href="{{$link_bk}}/user.html"><i class="glyphicon glyphicon-info-sign"></i>{{$lang.userbk}}</a></li>
                        </ul>
                    </li>
                    <!-- / Config System-->

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>