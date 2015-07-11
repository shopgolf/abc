<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('to_money')) {
	function to_money($val, $symbol='VNĐ',$r=2){
		$n = $val;
		$c = is_float($n) ? 1 : number_format($n,$r);
		$d = '.';
		$t = ',';
		$sign = ($n < 0) ? '-' : '';
		$i = $n=number_format(abs($n),$r);
		$j = (($j = strlen($i)) > 3) ? $j % 3 : 0;
	
		return  $sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)).' '.$symbol ;
	
	}
}

/* End of file paging_helper.php */
/* Location: ./helpers/paging_helper.php */
