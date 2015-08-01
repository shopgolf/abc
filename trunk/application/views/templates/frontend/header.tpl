<!-- MAIN HEADER -->
<div class="container-fuild main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="{{$site_url}}" title=""><img alt="Kute Shop" src="{{$UPLOAD_DIR}}/logo/Logo.png" /></a>
            </div>
            <div class="col-xs-6 col-sm-5 header-search-box">
                <form class="form-inline" action="" method="post">
                      <div class="form-group input-serach">
                        <input type="text"  placeholder="Keyword here...">
                      </div>
                      <button type="submit" class="pull-right btn-search"></button>
                </form>
            </div>
            <div class="col-sm-6 col-md-4 group-button-header">
                <a title="Login" href="{{$site_url}}dang-nhap.html" class="btn-login">{{$lang.login}}</a>
                <a title="Phone" href="javascript:void(0)" class="btn-heart"><i class="fa fa-phone"></i> 0909 023 668</a>
            </div>
        </div>
    </div>
</div>