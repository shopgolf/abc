<div class="columns-container">
    <div class="container" id="columns">
        <div class="breadcrumb clearfix">
            <a class="home" href="{{$site_url}}" title="{{$lang.home}}">{{$lang.home}}</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">{{$lang.tin_tuc}}</span>
        </div>
        <div class="row">
            {{$sidebar_left}}
            <div class="center_column col-xs-12 col-sm-9 special-products" id="center_column">
                        {{if $count > 1}}
                             <div class="news">
                                 <ul>
                                    {{foreach $news as $value}}
                                        {{$image = json_decode($value->feature_img)}}
                                        <li>
                                            <a href="{{$bookinglib->build_url({{$lang.tin_tuc}},$value->seo_url)}}"><img src="{{$UPLOAD_DIR}}post/{{$image[0]}}" alt="" width="141px"></a>
                                            <div class="news-title" style="max-width:672px">
                                                <h3><a href="{{$bookinglib->build_url({{$lang.tin_tuc}},$value->seo_url)}}" title="{{$value->title}}">{{$value->title}}</a></h3>
                                                <div class="align">
                                                  {{$bookinglib->getContentDes($value->description)}}
                                                </div>
                                            </div>
                                        </li>
                                    {{/foreach}}
                                 </ul>
                             </div>
                        {{else}}
                            <h2>{{$news->title}}</h2>
                            <p>{{$news->description}}</p>
                        {{/if}}
            </div>
        </div>
    </div>
</div>