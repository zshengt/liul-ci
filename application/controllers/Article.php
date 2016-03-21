<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Article extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Article_model', 'article');
		}

		public function query(){
			$info = $this->input->post();
			$article = $this->article->getList($info);
			var_dump($article);
		}
	}
?>