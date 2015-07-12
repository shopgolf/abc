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
            <button type="" class="btn btn-default btn-sm"><i class="fa fa-remove"></i>{{$lang.delete}}</button>
            <button type="" class="btn btn-default btn-sm"><i class="fa fa-check"></i>{{$lang.accept}}</button>
        </td>
    </tr>
{{/foreach}}