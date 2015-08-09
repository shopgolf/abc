<!-- END MANIN HEADER -->
<div id="nav-top-menu" class="nav-top-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="box-vertical-megamenus">
                <div class="box-vertical-megamenus">
                <h4 class="title">
                    <span class="title-menu">{{$lang.category}}</span>
                    <span class="btn-open-mobile pull-right"><i class="fa fa-bars"></i></span>
                </h4>
                <div class="vertical-menu-content is-home">
                    <ul class="vertical-menu-list">
                        {{foreach $lists as $keys => $values}}
                            {{if $values->child_category == ""}}
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$values->name}}</a>
                                    <ul class="dropdown-menu container-fluid">
                                        <li class="block-container">
                                            <ul class="block">
                                                {{foreach $values->category as $k => $v}}
                                                    <li class="link_container"><a href="{{$v.seo_url}}">{{$v.category_name}}</a></li>
                                                {{/foreach}}
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            {{else}}
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$values->name}}</a>
                                    <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                                        {{foreach $values->child_category as $m => $n}}
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="link_container group_header">
                                                        {{foreach $values->category as $q => $p}}
                                                            {{if $q == $m}}
                                                                <a href="{{$site_url}}{{$p.seo_url}}">{{$p.category_name}}</a>
                                                            {{/if}}
                                                        {{/foreach}}
                                                    </li>
                                                    {{foreach $n as $h => $t}}
                                                        <li class="link_container"><a href="{{$t.seo_url}}">{{$t.name}}</a></li>
                                                    {{/foreach}}
                                                </ul>
                                            </li>
                                        {{/foreach}}
                                    </ul>
                                </li>
                            {{/if}}
                        {{/foreach}}
                    </ul>
                </div> 
            </div>
            </div>
            <div id="main-menu" class="col-sm-9 main-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">{{$lang.golf_clubs}}</a>
                                    <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                                        <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="img_container">
                                                    <a href="#">
                                                        <img class="img-responsive" src="{{$static_ft}}/data/men.png" alt="sport">
                                                    </a>
                                                </li>
                                                <li class="link_container group_header">
                                                    <a href="#">MEN'S</a>
                                                </li>
                                                <li class="link_container"><a href="#">Skirts</a></li>
                                                <li class="link_container"><a href="#">Jackets</a></li>
                                                <li class="link_container"><a href="#">Tops</a></li>
                                                <li class="link_container"><a href="#">Scarves</a></li>
                                                <li class="link_container"><a href="#">Pants</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="img_container">
                                                    <a href="#">
                                                        <img class="img-responsive" src="{{$static_ft}}/data/women.png" alt="sport">
                                                    </a>
                                                </li>
                                                <li class="link_container group_header">
                                                    <a href="#">WOMEN'S</a>
                                                </li>
                                                <li class="link_container"><a href="#">Skirts</a></li>
                                                <li class="link_container"><a href="#">Jackets</a></li>
                                                <li class="link_container"><a href="#">Tops</a></li>
                                                <li class="link_container"><a href="#">Scarves</a></li>
                                                <li class="link_container"><a href="#">Pants</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="img_container">
                                                    <a href="#">
                                                        <img class="img-responsive" src="{{$static_ft}}/data/kid.png" alt="sport">
                                                    </a>
                                                </li>
                                                <li class="link_container group_header">
                                                    <a href="#">Kids</a>
                                                </li>
                                                <li class="link_container"><a href="#">Shoes</a></li>
                                                <li class="link_container"><a href="#">Clothing</a></li>
                                                <li class="link_container"><a href="#">Tops</a></li>
                                                <li class="link_container"><a href="#">Scarves</a></li>
                                                <li class="link_container"><a href="#">Accessories</a></li>
                                            </ul>
                                        </li>
                                         <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="img_container">
                                                    <a href="#">
                                                        <img class="img-responsive" src="{{$static_ft}}/data/trending.png" alt="sport">
                                                    </a>
                                                </li>
                                                <li class="link_container group_header">
                                                    <a href="#">TRENDING</a>
                                                </li>
                                                <li class="link_container"><a href="#">Men's Clothing</a></li>
                                                <li class="link_container"><a href="#">Kid's Clothing</a></li>
                                                <li class="link_container"><a href="#">Women's Clothing</a></li>
                                                <li class="link_container"><a href="#">Accessories</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="category.html">{{$lang.fittings}}</a></li>
                                <li class="dropdown">
                                    <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">{{$lang.auction}}</a>
                                    <ul class="dropdown-menu container-fluid">
                                        <li class="block-container">
                                            <ul class="block">
                                                <li class="link_container"><a href="#">Mobile</a></li>
                                                <li class="link_container"><a href="#">Tablets</a></li>
                                                <li class="link_container"><a href="#">Laptop</a></li>
                                                <li class="link_container"><a href="#">Memory Cards</a></li>
                                                <li class="link_container"><a href="#">Accessories</a></li>
                                            </ul>
                                        </li>
                                    </ul> 
                                </li>
                               
                                <li><a href="category.html" class="dropdown-toggle" data-toggle="dropdown">{{$lang.sevices}}</a></li>
                                <li class="dropdown">
                                    <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">{{$lang.golf_Simulators}}</a>
                                        <ul class="mega_dropdown dropdown-menu" style="width: 830px;">
                                        <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="link_container group_header">
                                                    <a href="#">Asian</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Vietnamese Pho</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Noodles</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Seafood</a>
                                                </li>
                                                <li class="link_container group_header">
                                                    <a href="#">Sausages</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Meat Dishes</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Desserts</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Tops</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Tops</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="link_container group_header">
                                                    <a href="#">European</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Greek Potatoes</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Famous Spaghetti</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Famous Spaghetti</a>
                                                </li>
                                                <li class="link_container group_header">
                                                    <a href="#">Chicken</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Italian Pizza</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">French Cakes</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Tops</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Tops</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="link_container group_header">
                                                    <a href="#">FAST</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Hamberger</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Pizza</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Noodles</a>
                                                </li>
                                                <li class="link_container group_header">
                                                    <a href="#">Sandwich</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Salad</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Paste</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Tops</a>
                                                </li>
                                                <li class="link_container">
                                                    <a href="#">Tops</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="block-container col-sm-3">
                                            <ul class="block">
                                                <li class="img_container">
                                                    <img src="{{$static_ft}}/data/banner-topmenu.jpg" alt="Banner">
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                <li><a href="category.html">{{$lang.club}}</a></li>
                                <li><a href="category.html">{{$lang.guide}}</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
        <!-- userinfo on top-->
        <div id="user-info-opntop">
        </div>
        <!-- CART ICON ON MMENU -->
        <div id="shopping-cart-box-ontop">
            <i class="fa fa-shopping-cart"></i>
            <div class="shopping-cart-box-ontop-content"></div>
        </div>
    </div>
</div>
