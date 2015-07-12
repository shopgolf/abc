<?php

function smarty_function_saleprice($params, &$smarty)
{
    if($params['old_price']!=0)
        return round((($params['old_price']-$params['new_price'])/$params['old_price'])*100);
    else
        return 0;
}