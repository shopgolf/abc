{{$slider}}
<!-- servives -->
<div class="services-wapper">
    <div class="container">
        <div class="service ">
            <div class="col-xs-6 col-sm-4 service-item">
                <div class="icon">
                    <img alt="services" src="{{$static_ft}}/data/s1.png" />
                </div>
                <div class="info">
                    <a href="#"><h3>Free Shipping</h3></a>
                    <span>On order over $200</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 service-item">
                <div class="icon">
                    <img alt="services" src="{{$static_ft}}/data/s2.png" />
                </div>
                <div class="info">
                    <a href="#"><h3>30-day return</h3></a>
                    <span>Moneyback guarantee</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 service-item">
                <div class="icon">
                    <img alt="services" src="{{$static_ft}}/data/s3.png" />
                </div>
                
                <div class="info" >
                    <a href="#"><h3>24/7 support</h3></a>
                    <span>Online consultations</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- box product new arrivals -->
<div class="box-products new-arrivals">
    <div class="container">
        <div class="box-product-head">
            <h3><a  href="{{$site_url}}hang-moi-ve.html" title="{{$lang.new_products_go}}"><span class="box-title">{{$lang.new_products_go}}</span></a></h3>
            <span class="trapezoid"></span>
            <ul class="box-tabs nav-tab">
                <li ><a data-toggle="tab" href="#tab-1">{{$lang.new_products}}</a></li>
                <li><a data-toggle="tab" href="#tab-2">{{$lang.old_products}}</a></li>
            </ul>
        </div>
        <div class="box-product-content">
            <div class="box-product-adv">
                <ul class="owl-carousel nav-center" data-items="1" data-dots="false" data-autoplay="true" data-nav="true">
                    <li><a href="#"><img src="{{$static_ft}}/data/option3/adv1.jpg" alt="adv"></a></li>
                    <li><a href="#"><img src="{{$static_ft}}/images/sale.jpg" alt="adv"></a></li>
                </ul>
               <!--top-view-->
               <div class="top-view">
                    <div class="box-product-head">
                        <h3><a href="{{$site_url}}xem-nhieu.html" title="{{$lang.top_view}}"><span class="box-title">{{$lang.top_view}}</span></a></h3>
                        <span class="trapezoid"></span>
                        <span class="eye pull-right"><i class="fa fa-eye"></i></span>
                    </div>
                    <ul>
                        {{if $data_topview_product != NULL}}
                        {{foreach $data_topview_product as $value}}
                        {{$image = json_decode($value->image)}}
                        <li>
                            <a href="{{$bookinglib->build_url($value->cat_url,$value->seo_url)}}" title="{{$value->product_name}}" class="img-top-view"><img src="{{$UPLOAD_DIR}}product/{{$image[0]}}" alt="{{$value->product_name}}"></a>
                            <div class="view-list">
                                <div class="rating">
                                    <div class="product-star">
                                        {{$value->product_code}}
                                    </div>
                                </div>
                                <h4><a href="{{$bookinglib->build_url($value->cat_url,$value->seo_url)}}" title="{{$value->product_name}}">{{Cutname($value->product_name,30)}}</a></h4>
                                <p>Giá: {{number_format($value->net_price,0,'','.')}}.VNĐ</p>
                            </div>
                        </li>
                        {{/foreach}}
                        {{/if}}
                    </ul>
               </div>
                <!--end-top-view-->
            </div>
            <div class="box-product-list">
                <div class="tab-container">
                    <div id="tab-1" class="tab-panel active">
                        {{foreach $data_old_product as $key => $value}}
                        <!--new product-->
                        <ul class="product-list owl-carousel nav-center" data-dots="false" data-loop="true" data-nav = "true" data-margin = "10" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                            {{foreach $value as $k => $v}}
                            {{$image = json_decode($v->image)}}
                            <li class="wapper-tooltip">
                                <div class="left-block">
                                    <a href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}"   title="{{$v->product_name}}"><img class="img-responsive" alt="product" src="{{$UPLOAD_DIR}}product/{{$image[0]}}" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="BUY" href="javascript:void(0)" >BUY</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}" title="{{$v->product_name}}">{{$v->product_name}}</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">{{number_format($v->net_price,0,'','.')}}.VNĐ</span>
                                    </div>
                                    <div class="product-star">
                                       {{$v->product_code}}
                                    </div>
                                </div>
                                <div class="price-percent-reduction2">
                                   SALE
                                </div>
                                <div class="tooltip-me">{{$v->product_name}}</div>
                            </li>
                             {{/foreach}}       
                        </ul>
                        {{/foreach}}
                        <!-- end new product-->
                    </div>
                    <div id="tab-2" class="tab-panel">
                        <!--old-product-->
                        {{foreach $data_old_product as $key => $value}}
                        <ul class="product-list owl-carousel nav-center" data-dots="false" data-loop="true" data-nav = "true" data-margin = "10" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                            {{foreach $value as $k => $v}}
                            {{$image = json_decode($v->image)}}
                            <li class="wapper-tooltip">
                                <div class="left-block">
                                    <a href="#"><img class="img-responsive" alt="product" src="{{$UPLOAD_DIR}}product/{{$image[0]}}" /></a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="BUY" href="{{$site_url}}">BUY</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">{{$v->product_name}}</a></h5>
                                    <div class="content_price">
                                        <span class="price product-price">{{number_format($v->net_price,0,'','.')}}.VNĐ</span>
                                    </div>
                                    <div class="product-star">
                                        {{$v->product_code}}
                                    </div>
                                </div>
                                <div class="price-percent-reduction2">
                                   SALE
                                </div>
                                <div class="tooltip-me"><p>{{$v->product_code}}</p></div>
                            </li>
                            {{/foreach}}            
                        </ul>
                        {{/foreach}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./box product new arrivals -->
<!-- Banner -->
<div class="block-banner">
    <div class="container">
        <ul class="owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "10" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
            <li><a href=""><img class="img-responsive" src="{{$static_ft}}/images/1.png" alt=""></a></li>
            <li><a href=""><img class="img-responsive" src="{{$static_ft}}/images/2.png" alt=""></a></li>
            <li><a href=""><img class="img-responsive" src="{{$static_ft}}/images/3.png" alt=""></a></li>
            <li><a href=""><img class="img-responsive" src="{{$static_ft}}/images/4.png" alt=""></a></li>
            <li><a href=""><img class="img-responsive" src="{{$static_ft}}/images/5.png" alt=""></a></li>
        </ul>
    </div>
</div>
<!-- ./Banner -->
<!--special-products-->
<div class="box-products special-products new-arrivals">
    <div class="container">
        <div class="box-product-content">
            <div class="box-product-adv">
                <div class="top-view sell">
                    <div class="box-product-head">
                        <h3><a href="{{$site_url}}ban-chay.html" title="{{$lang.top_sell_products}}"><span class="box-title">{{$lang.top_sell_products}}</span></a></h3>
                        <span class="trapezoid"></span>
                    </div>
                    <div id="carousel-id-2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                           {{foreach $data_checkout as $key => $value}}
                            <div class="item {{if $key == 0  }} active{{/if}}">
                                <ul>
                                    {{foreach  $value as $k => $v}}
                                        {{$image = json_decode($v->image)}}
                                    <li>
                                        <a href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}" class="img-top-view"><img src="{{$UPLOAD_DIR}}product/{{$image[0]}}" alt=""></a>
                                        <div class="view-list">
                                            <div class="rating"> <div class="product-star">
                                                  {{$v->product_code}}
                                                </div></div>
                                            <h4><a href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}">{{$v->product_name}}</a></h4>
                                            <p>{{number_format($v->net_price,0,'','.')}}.VNĐ</p>
                                        </div>
                                    </li>
                                    {{/foreach}}
                                </ul>
                            </div>
                            {{/foreach}}
                        </div>
                        <a class="left carousel-control" href="#carousel-id-2" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#carousel-id-2" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="box-product-list">
                <div class="box-product-head">
                    <h3><a href="{{$site_url}}tin-tuc.html" title="{{$lang.news}}"><span class="box-title">{{$lang.news}}</span></a></h3>
                    <span class="trapezoid"></span>
                </div>
                <div class="news">
                    <ul>
                        {{foreach $data_post as $value}}
                        <li>
                            <a href=""><img src="{{$static_ft}}/images/news.png" alt=""></a>
                            <div class="news-title">
                                <h3><a href="" title="{{$value->title}}">{{$value->title}}</a></h3>
                                <p>
                                  {{$value->description}}
                                </p>
                            </div>
                        </li>
                        {{/foreach}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--recommendation-->
<div class="box-products recommendation">
    <div class="container">
        <div class="box-product-head">
            <ul class="box-tabs nav-tab pull-left">
                <li class="active"><a data-toggle="tab" href="#tab-7">Gậy golf</a></li>
                <li><a data-toggle="tab" href="#tab-8">Trang phục</a></li>
                <li><a data-toggle="tab" href="#tab-9">Phụ kiện</a></li>
                <li><a data-toggle="tab" href="#tab-10">hãng sản xuất</a></li>
            </ul>
        </div>
        <div class="box-product-content">
            <div class="tab-container top-view">
                <div id="tab-7" class="tab-panel active ">
                    <ul>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="tab-8" class="tab-panel">
                     <ul>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/withone GFIT14 trang -200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="tab-9" class="tab-panel">
                     <ul>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/Withone GA0232-001-02-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="tab-10" class="tab-panel">
                     <ul>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                         <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                        <li>
                            <a href="" class="img-top-view"><img class="img-responsive" src="{{$static_ft}}/images/16600150563714-200x200.jpg" alt=""></a>
                            <div class="view-list">
                                <div class="rating"><a href="" title="">Nike PD8 Power Distance   Soft Golf Balls GL0551</a></div>
                                <p>Giá: 500.000 VNĐ</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end recommendation-->
<!-- Footer -->