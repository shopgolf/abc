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
                            {{foreach $slide_category as $key => $value}}
                               {{if $value->type == 1}}
                                    <li><a href="{{$bookinglib->build_url($menu_rewrite,$value->seo_url)}}"><img class="icon-menu" alt="{{$value->name}}" title="{{$value->name}}" src="{{$static_ft}}/data/{{$key+1}}.png">{{$value->name}}</a></li>
                               {{else}}
                                    <li><a href="{{$bookinglib->build_url($rewrite_s,$value->seo_url)}}"><img class="icon-menu" alt="{{$value->name}}" title="{{$value->name}}" src="{{$static_ft}}/data/{{$key+1}}.png">{{$value->name}}</a></li>
                               {{/if}}
                            {{/foreach}}
                        </ul>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>