<div id="home-slider">
    <div class="container-fuild">
        <div class="row">
            <!--<div class="col-sm-3 slider-left"></div>-->
            <div class="col-sm-12 header-top-right">
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                   <!-- Start WOWSlider.com BODY section -->
                    <div id="wowslider-container1">
                        <div class="ws_images">
                            <ul>
                                {{$k = 0 }}
                                {{foreach $data_slider as $value}}
                                {{$k = $k + 1}}
                                <li class="item">
                                    <a href="{{$site_url}}{{$value->link}}" title="{{$value->title}}" target="_blank"><img src="{{$UPLOAD_DIR}}banner/{{$value->image}}" alt="{{$value->title}}" title="{{$value->title}}" id="wows{{$k}}_0"/></a>
                                </li>
                                {{/foreach}}
                            </ul>
                        </div>
                    </div>  
                </div>
               <div class="box-vertical-megamenus col-sm-2">
                    <h4 class="title">
                        <span class="title-menu">{{$lang.category}}</span>
                        <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">
                            <li><a href="#"><img class="icon-menu" alt="Funky roots" src="{{$static_ft}}/data/12.png">Driver</a></li>
                            <li>
                                <a class="parent" href="#"><img class="icon-menu" alt="Funky roots" src="{{$static_ft}}/data/13.png">Utility</a>
                                <div class="vertical-dropdown-menu">
                                    <div class="vertical-groups col-sm-12">
                                        <div class="mega-group col-sm-4">
                                            <h4 class="mega-group-header"><span>Tennis</span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="#">Tennis</a></li>
                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                <li><a href="#">Intimates</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-group col-sm-4">
                                            <h4 class="mega-group-header"><span>Swimming</span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="#">Dresses</a></li>
                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                <li><a href="#">Intimates</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-group col-sm-4">
                                            <h4 class="mega-group-header"><span>Shoes</span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="#">Dresses</a></li>
                                                <li><a href="#">Coats &amp; Jackets</a></li>
                                                <li><a href="#">Blouses &amp; Shirts</a></li>
                                                <li><a href="#">Tops &amp; Tees</a></li>
                                                <li><a href="#">Hoodies &amp; Sweatshirts</a></li>
                                                <li><a href="#">Intimates</a></li>
                                            </ul>
                                        </div>
                                        <div class="mega-custom-html col-sm-12">
                                            <a href="#"><img src="{{$static_ft}}/data/banner-megamenu.jpg" alt="Banner"></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="icon-menu" alt="Funky roots" src="{{$static_ft}}/data/21.png">Fairway
                                </a>
                            </li>
                             <li>
                                <a href="#">
                                    <img class="icon-menu" alt="Funky roots" src="{{$static_ft}}/data/17.png">Iron
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="icon-menu" alt="Funky roots" src="{{$static_ft}}/data/14.png">Wedge
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="icon-menu" alt="Funky roots" src="{{$static_ft}}/data/19.png">Putter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="icon-menu" alt="Funky roots" src="{{$static_ft}}/data/20.png">Lefty
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>