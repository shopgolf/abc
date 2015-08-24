<div id="nav-top-menu" class="nav-top-menu">
    <div class="container">
        <div class="row">
            <div id="main-menu" class="col-sm-12 main-menu">
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
                                <li class="active"><a href="{{$site_url}}">{{$lang.home}}</a></li>
                                {{foreach $lists as $keys => $values}}
                                    {{if $values->child_category == ""}}
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$values->name}}</a>
                                            <ul class="dropdown-menu container-fluid">
                                                <li class="block-container">
                                                    <ul class="block">
                                                        {{foreach $values->category as $k => $v}}
                                                            {{if  $v.type == 1}}
                                                                <li class="link_container"><a href="{{$bookinglib->build_url($menu_rewrite,$v.seo_url)}}">{{$v.category_name}}</a></li>
                                                            {{else}}
                                                                <li class="link_container"><a href="{{$bookinglib->build_url($rewrite_s,$v.seo_url)}}">{{$v.category_name}}</a></li>
                                                            {{/if}}
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
                                                                        {{if  $p.type == 1}}
                                                                            <a href="{{$bookinglib->build_url($menu_rewrite,$p.seo_url)}}">{{$p.category_name}}</a>
                                                                        {{else}}
                                                                            <a href="{{$bookinglib->build_url($rewrite_s,$p.seo_url)}}">{{$p.category_name}}</a>
                                                                        {{/if}}
                                                                    {{/if}}
                                                                {{/foreach}}
                                                            </li>
                                                            {{foreach $n as $h => $t}}
                                                                {{if  $t.type == 1}}
                                                                    <li class="link_container"><a href="{{$bookinglib->build_url($menu_rewrite,$t.seo_url)}}">{{$t.name}}</a></li>
                                                                {{else}}
                                                                    <li class="link_container"><a href="{{$bookinglib->build_url($rewrite_s,$t.seo_url)}}">{{$t.name}}</a></li>
                                                                {{/if}}
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