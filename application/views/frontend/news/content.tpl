<div class="columns-container">
    <div class="container" id="columns">
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Fashion</span>
        </div>
        <div class="row">
            {{$sidebar_left}}
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <div class="box-products">
                    <div class="box-products">
                        {{if $count > 1}}
                            <h2>{{$news->title}}</h2>
                            <p>{{$news->description}}</p>
                        {{else}}
                            {{foreach $news as $value}}
                                <h2>{{$value->title}}</h2>
                                <p>{{$value->description}}</p>
                            {{/foreach}}
                        {{/if}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>