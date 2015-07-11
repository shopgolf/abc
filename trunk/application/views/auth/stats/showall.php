<?php
    foreach($list as $keys => $vals){
        echo '<tr>';
        echo '<td><a>'.$vals->product_code.'</a></td>';
        echo '<td><a>'.$vals->quantity.'</a></td>';
        echo '<td><a>'.$vals->info.'</a></td>';
        echo '<td><a>'.$vals->cname.'</a></td>';
        echo '<td><a>'.$vals->caddress.'</a></td>';
        echo '<td><a>'.$vals->cphone.'</a></td>';
        echo '<td><a>'.$vals->cemail.'</a></td>';
        echo '<td><a>'.$vals->cnumber.'</a></td>';
        echo '<td><a>'.date("d-m-Y H:i:s",$vals->createdTime).'</a></td>';
        echo '</tr>';
    }
    die();
?>
