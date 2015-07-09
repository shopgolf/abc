<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Adminlog Controller
 * Build by Phuc Nguyen
 * Contact : nguyenvanphuc0626@gmail.com
 */

class Cronjob_model extends MY_Model{
	
	public function __construct(){
		parent::__construct();
		$this->table_name = 'book_adminlog';
	}
        
        public function selectDL($status,$waiting){
            $sql  = "SELECT sales.customerID,sales.type,p.phone,p.status,p.waiting FROM `book_sales` AS sales
JOIN book_sales_phone AS p
ON sales.phone = p.phone
WHERE p.status = {$status} AND waiting = {$waiting}";
//            die($sql);
            $query  = $this->db->query($sql);
            return $query->result();
            
        }
        
        public function updateDL($params){
            $sql = "UPDATE `book_sales_phone` SET `status` = '1', `waiting` = '0' WHERE `book_sales_phone`.`phone` = '{$params}'";
//            die($sql);
            $this->db->query($sql);
            return $this->db->affected_rows();
        }

        public function selectAll(){
            
            $sql    = "select phone from vna_customer limit 18000,938";//0906755234
            $query  = $this->db->query($sql);

            return $query->result();
        }
        
        public function add($params){
            $this->db->query($params);
            return $this->db->affected_rows();
        }
        
        public function emptyTask(){
            $sql    = "truncate table test";
            $query  = $this->db->query($sql);
        }
        
        public function statitic($params){
            $sql    = "SELECT DATE_FORMAT(lastLogin,'%Y-%m-%d') AS date, count(*) AS total FROM `book_adminlog`
                        WHERE logAction like '".$params."%'
                        GROUP BY DATE_FORMAT(lastLogin,'%Y-%m-%d')";
            $query  = $this->db->query($sql);
            return $query->result();
        }
        
        public function insertStatic($params){
            $sql = "INSERT INTO book_adminlog_static1 VALUES ".$params;
//            die($sql);
            $this->db->query($sql);
            return $this->db->affected_rows();
        }
		
        public function phoneRelize(){
                $sql  = 'update `book_sales_phone` set status =0, waiting =0 where status =2 and waiting = 1';
                $this->db->query($sql);
                        return $this->db->affected_rows();
        }
        
        public function selectBookingTicket($params){
            $sql    = "SELECT * FROM book_list_booking WHERE payment_method = {$params} AND payment_confirm = 0";
            $query  = $this->db->query($sql);
            return $query->result();
        }
        
        public function cronHistoryLog($pre,$behind){
            $sql    = "SELECT booking_id,booking_place_code FROM book_history ORDER BY lastupdated DESC LIMIT {$pre},{$behind}";
//            die($sql);
            $query  = $this->db->query($sql);
            return $query->result();
        }
}