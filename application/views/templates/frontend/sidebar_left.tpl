<div class="column col-xs-12 col-sm-3" id="left_column">
    <!-- block category -->
    <div class="block left-module">
        <p class="title_block">{{$lang.product_types}}</p>
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
        <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
            <li><a href="#"><img src="{{$static_ft}}/data/slide-left.jpg" alt="slide-left"></a></li>
            <li><a href="#"><img src="{{$static_ft}}/data/slide-left2.jpg" alt="slide-left"></a></li>
            <li><a href="#"><img src="{{$static_ft}}/data/slide-left3.png" alt="slide-left"></a></li>
        </ul>

    </div>
    <!--./left silde-->
    <!-- SPECIAL -->
    <div class="block left-module">
        <p class="title_block">{{$lang.special_products}}</p>
        <div class="block_content">
            <ul class="products-block">
                <li>
                    <div class="products-block-left">
                        <a href="{{$special_products->product_link}}">
                            <img src="{{$UPLOAD_DIR}}product/{{$special_products->image}}" alt="{{$special_products->product_name}}" title="{{$special_products->product_name}}"/>
                        </a>
                    </div>
                    <div class="products-block-right">
                        <p class="product-name">
                            <a href="{{$special_products->product_link}}">{{$special_products->product_name}}</a>
                        </p>
                        <p class="product-price">{{$special_products->net_price|number_format:0:".":","}} VNĐ</p>
                        <p class="product-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </p>
                    </div>
                </li>
            </ul>
            <div class="products-block">
                <div class="products-block-bottom">
                    <a class="link-all" href="{{$special_products->product_link}}">{{$lang.detail}}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ./SPECIAL -->
</div>