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
                                                    <li class="link_container"><a href="{{$bookinglib->build_url($menu_rewrite,$v.seo_url)}}">{{$v.category_name}}</a></li>
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
                                                                <a href="{{$bookinglib->build_url($menu_rewrite,$p.seo_url)}}">{{$p.category_name}}</a>
                                                            {{/if}}
                                                        {{/foreach}}
                                                    </li>
                                                    {{foreach $n as $h => $t}}
                                                        <li class="link_container"><a href="{{$bookinglib->build_url($menu_rewrite,$t.seo_url)}}">{{$t.name}}</a></li>
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
                            <ul class="nav navbar-nav menu">
                                {{foreach $lists as $keys => $values}}
                                    {{if $values->child_category == ""}}
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$values->name}}</a>
                                            <ul class="dropdown-menu container-fluid">
                                                <li class="block-container">
                                                    <ul class="block">
                                                        {{foreach $values->category as $k => $v}}
                                                            <li class="link_container"><a href="{{$bookinglib->build_url($v.seo_url,NULL)}}">{{$v.category_name}}</a></li>
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
