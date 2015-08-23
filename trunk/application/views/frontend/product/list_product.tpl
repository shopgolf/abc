<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Fashion</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            {{$sidebar_left}}
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- subcategories -->
                <div class="box-products">
                    <div class="box-product-head">
                        <span class="box-title">Lọc sản phẩm</span>
                        <span class="trapezoid"></span>
                    </div>
                    <div class="subcategories">
                        <form class="" action="{{$site_url}}loc-san-pham.html" method="post">
                            <select  class="search-cate " name="type" id="">
                                <option value="">-- Loại gậy -- </option>
                                <option value="">10000000 - 20000000 VNĐ</option>
                                <option value="">2000000 - 40000000 VNĐ</option>
                            </select>
                            <select  class="search-cate" name="maker" id="">
                                <option value="">-- Hãng sản xuất--</option>
                                {{foreach $maker as $k => $v}}
                                <option value="{{$k}}">{{$v}}</option>
                                {{/foreach}}
                            </select>
                            <select  class="search-cate" name="hardness" id="">
                                <option value="">-- Hardness -- </option>
                                {{foreach $hardness as $k => $v}}
                                <option value="{{$k}}" name="hardness"> {{$v}} </option>
                                {{/foreach}}    
                            </select>
                            <select  class="search-cate" name="loft" id="">
                                <option value="">-- Độ gậy -- </option>
                                {{foreach $loft as $k => $v}}
                                <option value="{{$k}}">{{$v}}</option>
                                {{/foreach}}    
                            </select>
                            <select  class="search-cate" name="club_rank" id="">
                                <option value="">-- Tình trạng -- </option>
                                {{foreach $club_rank as $k => $v}}
                                <option value="{{$k}}">{{$v}}</option>
                                {{/foreach}}  
                            </select>

                            <div style="float:left;margin-right:5px;padding:0px 10px" class="search-cate" >      
                                <input type="text" name="price_start" size="20">  
                            </div>

                            <div style="float:left;margin-right:5px;padding:0px 10px" class="search-cate" >
                                <input type="text" name="price_end" size="20">  
                            </div>
                            <button type="submit">Tìm Kiếm</button>
                        </form>
                    </div>
                </div>
                <!-- ./subcategories -->
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title">Drive</span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        {{if $data != NULL}}
                        {{foreach $data as $key => $value}}
                        {{$image = json_decode($value->image)}}
                        <li class="col-sx-12 col-sm-4 wapper-tooltip">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="{{$bookinglib->build_url($value->cat_url,$value->seo_url)}}">
                                        <img class="img-responsive" alt="product" src="{{$UPLOAD_DIR}}product/{{$image[0]}}" />
                                    </a>
                                    <div class="quick-view">
                                        <a title="Quick view" class="search" data-toggle="modal" data-target=".{{$value->product_id}}" href="javascript:void(0)"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="{{$bookinglib->build_url($value->seo_url,NULL)}}">{{$value->product_name}}</a></h5>
                                    <div class="content_price">
                                        {{if $value->final_price}}
                                        <span class="price product-price">{{number_format($value->final_price,0,'','.')}}.{{$lang.vn_currency}}</span>
                                        <span class="price old-price">{{number_format($value->net_price,0,'','.')}}</span>
                                        {{else}}
                                        <span class="price product-price">{{number_format($value->net_price,0,'','.')}}.{{$lang.vn_currency}}</span>
                                        {{/if}}
                                    </div>
                                    <div class="product-star">
                                        {{$value->product_code}}
                                    </div>
                                    <div class="info-orther">
                                        <p>Item Code: #453217907</p>
                                        <p class="availability">Availability: <span>In stock</span></p>
                                        <div class="product-desc">
                                            {{$value->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bs-example-modal-sm {{$value->product_id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{{$value->product_name}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            {{$value->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{/foreach}}
                        {{/if}}
                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
                    <div class="bottom-pagination">
                        <nav>
                            <ul class="pagination">
                                {{$pagination}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>