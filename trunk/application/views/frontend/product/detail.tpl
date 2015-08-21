<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{$info->product_name}}</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block best sellers -->
                <div class="block left-module">
                    <p class="title_block">NEW PRODUCTS</p>
                    <div class="block_content">
                        <ul class="products-block best-sell">
                            {{foreach $data as $value}}
                               {{$image = json_decode($value->image)}}
                            <li>
                                <div class="products-block-left">
                                    <a href="{{$bookinglib->build_url($value->cat_url,$value->seo_url)}}">
                                        <img src="{{$UPLOAD_DIR}}product/{{$image[0]}}" alt="SPECIAL PRODUCTS">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="{{$bookinglib->build_url($value->cat_url,$value->seo_url)}}" title="{{$value->product_name}}">{{$value->product_name}}</a>
                                    </p>
                                    <p class="product-price">{{number_format($value->net_price,0,'','.')}}.VNĐ</p>
                                </div>
                            </li>
                            {{/foreach}}
                        </ul>
                    </div>
                </div>
                <!-- ./block best sellers  -->
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">INFORMATION</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    {{foreach $data_category as $key=> $value}}
                                        <li><span></span><a href="{{$bookinglib->build_url($value->seo_url,NULL)}}">{{$value->name}}</a></li>
                                    {{/foreach }}
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                
                
                <!-- left silide -->
                <div class="col-left-slide left-module">
                    <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                        <li><a href="#"><img src="{{$static_ft}}/data/slide-left.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="{{$static_ft}}/data/slide-left2.jpg" alt="slide-left"></a></li>
                        <li><a href="#"><img src="{{$static_ft}}/data/slide-left3.png" alt="slide-left"></a></li>
                    </ul>
                </div>
                <!--./left silde-->
                <!-- block best sellers -->
                <div class="block left-module">
                    <p class="title_block">ON SALE</p>
                    <div class="block_content product-onsale">
                        <ul class="product-list owl-carousel" data-loop="true" data-nav = "false" data-margin = "0" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
                            <li>
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="#">
                                            <img class="img-responsive" alt="product" src="{{$static_ft}}/data/product-260x317.jpg" />
                                        </a>
                                        <div class="price-percent-reduction2">-30% OFF</div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                    </div>
                                    <div class="product-bottom">
                                        <a class="btn-add-cart" title="{{$lang.add_to_cart}}" href="fffffffffff">{{$lang.add_to_cart}}</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="#">
                                            <img class="img-responsive" alt="product" src="{{$static_ft}}/data/p35.jpg" />
                                        </a>
                                        <div class="price-percent-reduction2">-10% OFF</div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                    </div>
                                    <div class="product-bottom">
                                        <a class="btn-add-cart" title="{{$lang.add_to_cart}}" href="aaaaaaaaaaaa">{{$lang.add_to_cart}}</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="#">
                                            <img class="img-responsive" alt="product" src="{{$static_ft}}/data/p37.jpg" />
                                        </a>
                                        <div class="price-percent-reduction2">-42% OFF</div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#">Maecenas consequat mauris</a></h5>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="content_price">
                                            <span class="price product-price">$38,95</span>
                                            <span class="price old-price">$52,00</span>
                                        </div>
                                    </div>
                                    <div class="product-bottom">
                                        <a class="btn-add-cart" title="{{$lang.add_to_cart}}" href="aaaaaaaaaaaaa">{{$lang.add_to_cart}}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ./block best sellers  -->
                <!-- left silide -->
                <!--./left silde-->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-6">
                                <!-- product-imge-->
                                <div class="product-image">
                                       {{$image = json_decode($info->image)}}
                                    <div class="product-full">
                                        <img id="product-zoom" src='{{$UPLOAD_DIR}}product/{{$image[0]}}' data-zoom-image="{{$UPLOAD_DIR}}product/{{$image[0]}}"/>
                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="true">
                                           {{foreach $image as $value}}
                                           <li>
                                                <a href="#" data-image="{{$UPLOAD_DIR}}product/{{$value}}" data-zoom-image="{{$UPLOAD_DIR}}product/{{$value}}">
                                                    <img id="product-zoom"  src="{{$UPLOAD_DIR}}product/{{$value}}" /> 
                                                </a>
                                            </li>
                                           {{/foreach}}
                                        </ul>
                                    </div>
                                </div>
                                <!-- product-imge-->
                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-6">
                                <h1 class="product-name">{{$info->product_name}}</h1>
                                
                                <div class="product-price-group">
                                    {{if $info->final_price}}
                                        <span class="price">{{number_format($info->final_price,0,'','.')}}.{{$lang.vn_currency}}</span>
                                        <span class="old-price">{{number_format($info->net_price,0,'','.')}}.{{$lang.vn_currency}}</span>
                                        <span class="discount">-{{$lang.percent}}%</span>
                                    {{else}}
                                        <span class="price">{{number_format($info->net_price,0,'','.')}}.{{$lang.vn_currency}}</span>
                                    {{/if}}
                                </div>
                                                                    
                                {{if $info->info}}
                                 <div class="product-desc">
                                     {{$info->info}}
                                 </div>
                                {{/if}}
                                
                                <div class="form-option">
                                    {{if $info->quantity > 0 }}
                                        Số lượng trong kho: {{$info->quantity}}
                                    {{else}}
                                    HẾT HÀNG!!!!
                                    {{/if}}
                                </div>
                                     
                                {{if $info->tag}}
                                 <div class="product-desc">
                                     {{$lang.keyword}} : {{$info->tag}}
                                 </div>
                                {{/if}}
                                
                                {{if $info->bid}}
                                <div class="form-option">
                                    Sản phẩm đang được đấu giá! Tham gia ngay!
                                </div>
                                {{/if}}
                                
                                <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart" href="{{$bookinglib->build_url('mua-hang',$info->seo_url)}}?token={{$token}}">{{$lang.add_to_cart}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="page-product-box">
                            <h3 class="heading">Sản phẩm liên quan</h3>
                            {{foreach $data_related as $key => $value}}
                            <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                {{foreach $value as $k => $v}}
                                {{$image = json_decode($v->image)}}
                                <li  class="wapper-tooltip">
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}" title="{{$v->product_name}}">
                                                <img class="img-responsive" alt="product" src="{{$UPLOAD_DIR}}product/{{$image[0]}}" />
                                            </a>
                                            <div class="quick-view">
                                                <a title="Quick view" class="search" data-toggle="modal" data-target=".{{$v->product_id}}" href="{{$site_url}}{{$v->seo_url}}-p{{$v->id}}.html"></a>
                                            </div>
                                            <div class="add-to-cart">
                                                <a title="{{$lang.add_to_cart}}" href="#add">{{$lang.add_to_cart}}</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="{{$bookinglib->build_url($v->cat_url,$v->seo_url)}}" title="{{$v->product_name}}">{{$v->product_name}}</a></h5>
                                            <div class="content_price">
                                                <span class="price product-price">{{number_format($v->net_price,0,'','.')}}.VNĐ</span>
                                                <span class="price old-price">$52,00</span>
                                            </div>
                                            <div class="product-star">
                                                {{$v->product_code}}
                                            </div>
                                        </div>
                                    </div>  
                                </li>
                                {{/foreach}}
                            </ul>
                            {{/foreach}}
                        </div>
                        <!-- ./box product -->
                    </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
{{foreach $data_related as $key => $value}}
  {{foreach $value as $k => $v}}
        <div class="modal fade bs-example-modal-sm {{$v->product_id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{$v->product_name}}</h4>
                </div>
                <div class="modal-body">
                    {{$v->description}}
                </div>
            </div>
          </div>
        </div>
  {{/foreach}}
{{/foreach}}
