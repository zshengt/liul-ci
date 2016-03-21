<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Article_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function getList($search=array(), $page=1, $pagecount=10){
			$query = $this->db->select('*')->from('article')->where($search)->order_by('')->limit($page*$pagecount,($page-1)*$pagecount)->get();
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}
	}
?>