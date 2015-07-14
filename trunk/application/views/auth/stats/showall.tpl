{{foreach $list as $vals}}
    <tr>
        <td>{{$vals->product_code}}</td>
        <td>{{$vals->quantity}}</td>
        <td>{{$vals->info}}</td>
        <td>{{$vals->cname}}</td>
        <td>{{$vals->caddress}}</td>
        <td>{{$vals->cphone}}</td>
        <td>{{$vals->createdTime|date_format:"%d-%m-%Y %H:%M:%S"}}</td>
        <td>
            <a class="btn btn-default btn-sm" data-toggle="modal" href="#delete_confirm" onclick="delete_confirm('/auth/stats/delete/{{$vals->id}}')"><i class="fa fa-check"></i>{{$lang.delete}}</a>
            <button class="btn btn-default btn-sm"><a onclick="action_accept('{{$link_bk}}/stats/accept/{{$vals->id}}')" ><i class="fa fa-check"></i>{{$lang.accept}}</a></button>
        </td>
    </tr>
{{/foreach}}

<script>
    function action_accept(url){
        $.ajax({
            url : url,
            type: "POST",
            cache: true,
            beforeSend: function(){
                
            },
            success:function(data) 
            {
                $.fancybox(data, {
                    margin		: 0,
                    padding		: 0,
                    maxWidth	: '480px',
                    maxHeight	: '400px',
                    fitToView	: false,
                    width		: '100%',
                    height		: '100%',
                    autoSize	: false,
                    closeClick	: false,
                    openEffect	: 'none',
                    closeEffect	: 'none',
                    titleShow	: true,
                    closeBtn	: false,
                }); // fancybox
            },
            error: function() 
            {

            }
        });
}
</sciprt>