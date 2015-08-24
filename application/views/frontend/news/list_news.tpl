<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Blog</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
             {{$sidebar_left}}
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                {{if $count > 1}}
                    <h2 class="page-heading">
                        <span class="page-heading-title2">{{$lang.list_news}}</span>
                    </h2>
                    <div class="sortPagiBar clearfix">
                        <span class="page-noite">Showing 1 to 7 of 45 (15 Pages)</span>
                        <div class="bottom-pagination">
                            <nav>
                              <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">Next &raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                    </div>
                    <ul class="blog-posts">
                       {{foreach $news as $value}}
                            {{$image = json_decode($value->feature_img)}}
                            <li class="post-item">
                                <article class="entry">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="entry-thumb image-hover2">
                                                <a href="{{$bookinglib->build_url({{$lang.tin_tuc}},$value->seo_url)}}">
                                                    <img src="{{$UPLOAD_DIR}}post/{{$image[0]}}" alt="{{$value->title}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="entry-ci">
                                                <h3 class="entry-title"><a href="{{$bookinglib->build_url({{$lang.tin_tuc}},$value->seo_url)}}" title="{{$value->title}}" title="{{$value->title}}">{{$value->title}}</a></h3>
                                                <div class="entry-meta-data">
                                                    <span class="date"><i class="fa fa-calendar"></i> 2014-08-05 07:01:49</span>
                                                </div>
                                                <div class="entry-excerpt">
                                                  {{$bookinglib->getContentDes($value->description)}}
                                                </div>
                                                <div class="entry-more">
                                                    <a href="{{$bookinglib->build_url({{$lang.tin_tuc}},$value->seo_url)}}" title="{{$value->title}}">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        {{/foreach}}
                    </ul>
                    <div class="sortPagiBar clearfix">
                        <div class="bottom-pagination">
                            <nav>
                              <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">Next &raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                    </div>
                {{else}}
                   <h1 class="page-heading">
                        <span class="page-heading-title2">{{$news->title}}</span>
                    </h1>
                      {{$image = json_decode($news->feature_img)}}
                    <article class="entry-detail">
                        <div class="entry-meta-data">
                            <span class="date"><i class="fa fa-calendar"></i> 2014-08-05 07:01:49</span>
                        </div>
                        <div class="entry-photo">
                            <img src="{{$UPLOAD_DIR}}post/{{$image[0]}}" alt="{{$news->title}}">
                        </div>
                        <div class="content-text clearfix">
                           {{$news->description}}
                        </div>
                    </article>
                {{/if}}
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
