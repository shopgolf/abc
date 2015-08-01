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
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Product types</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    {{foreach $data_category as $key=> $value}}
                                    <li><span></span><a href="{{$site_url}}{{$value->seo_url}}-c{{$value->id}}.html">{{$value->name}}</a></li>
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
                    <p class="title_block">SPECIAL PRODUCTS</p>
                    <div class="block_content">
                        <ul class="products-block">
                            <li>
                                <div class="products-block-left">
                                    <a href="#">
                                        <img src="{{$static_ft}}/data/product-100x122.jpg" alt="SPECIAL PRODUCTS">
                                    </a>
                                </div>
                                <div class="products-block-right">
                                    <p class="product-name">
                                        <a href="#">Woman Within Plus Size Flared</a>
                                    </p>
                                    <p class="product-price">$38,95</p>
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
                                <a class="link-all" href="#">All Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./SPECIAL -->
                <!-- TAGS -->
                <div class="block left-module">
                    <p class="title_block">TAGS</p>
                    <div class="block_content">
                        <div class="tags">
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                            <a href="#"><span class="level1">actual</span></a>
                            <a href="#"><span class="level2">adorable</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level4">consider</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level3">change</span></a>
                            <a href="#"><span class="level2">gives</span></a>
                            <a href="#"><span class="level1">good</span></a>
                            <a href="#"><span class="level3">phenomenon</span></a>
                            <a href="#"><span class="level4">span</span></a>
                            <a href="#"><span class="level1">spanegs</span></a>
                            <a href="#"><span class="level5">spanegs</span></a>
                        </div>
                    </div>
                </div>
                <!-- ./TAGS -->
            </div>
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
                        <form class="" action="" method="post">
                            <select  class="search-cate " name="" id="">
                                <option value="">-- Giá Tiền -- </option>
                                <option value="">10000000 - 20000000 VNĐ</option>
                                <option value="">2000000 - 40000000 VNĐ</option>
                            </select>
                            <select  class="search-cate" name="" id="">
                                <option value="">-- Hãng sản xuất--</option>
                                <option value="">AKIRA</option>
                                <option value="">FOOTJOY</option>
                            </select>
                            <select  class="search-cate" name="" id="">
                               <option value="">-- Giá Tiền -- </option>
                                <option value="">10000000 - 20000000 VNĐ</option>
                                <option value="">2000000 - 40000000 VNĐ</option>
                            </select>
                            <select  class="search-cate" name="" id="">
                               <option value="">-- Giá Tiền -- </option>
                                <option value="">10000000 - 20000000 VNĐ</option>
                                <option value="">2000000 - 40000000 VNĐ</option>
                            </select>
                            <select  class="search-cate" name="" id="">
                                <option value="">-- Giá Tiền -- </option>
                                <option value="">10000000 - 20000000 VNĐ</option>
                                <option value="">2000000 - 40000000 VNĐ</option>
                            </select>
                            <select  class="search-cate" name="" id="">
                                <option value="">-- Giá Tiền -- </option>
                                <option value="">10000000 - 20000000 VNĐ</option>
                                <option value="">2000000 - 40000000 VNĐ</option>
                            </select>
                            <select  class="search-cate" name="" id="">
                                <option value="">-- Giá Tiền -- </option>
                                <option value="">10000000 - 20000000 VNĐ</option>
                                <option value="">2000000 - 40000000 VNĐ</option>
                            </select>
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
                        <li class="col-sx-12 col-sm-4">
                            <div class="product-container">
                                <div class="left-block">
                                    <a href="#">
                                        <img class="img-responsive" alt="product" src="{{$UPLOAD_DIR}}data/{{$image[0]}}" />
                                    </a>
                                    <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="{{$site_url}}{{$value->seo_url}}-p{{$value->id}}.html"></a>
                                    </div>
                                    <div class="add-to-cart">
                                        <a title="Add to Cart" href="#add">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <h5 class="product-name"><a href="#">{{$value->product_name}}</a></h5>
                                    <div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="content_price">
                                        <span class="price product-price">{{number_format($value->net_price,0,'','.')}}.VNĐ</span>
                                        <span class="price old-price">$52,00</span>
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
                    <div class="show-product-item">
                        <select name="">
                            <option value="">Show 18</option>
                            <option value="">Show 20</option>
                            <option value="">Show 50</option>
                            <option value="">Show 100</option>
                        </select>
                    </div>
                    <div class="sort-product">
                        <select>
                            <option value="">Product Name</option>
                            <option value="">Price</option>
                        </select>
                        <div class="sort-product-icon">
                            <i class="fa fa-sort-alpha-asc"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>