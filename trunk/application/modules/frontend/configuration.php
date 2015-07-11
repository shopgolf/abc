<?php if (!defined('BASEPATH')) exit('No direct script access allowed');	

 $select = array('payment','register','forget_pass','download','metadate','play','forum','thienco','dichkiem','hoanghoa','myanh','facebook','yahoo','google','fanpage','tinhnang','gallery','vip');
 $this->view_data['configuration'] = $this->configuration_model->get_by_code($select); 

