<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
          
    function __construct(){    
        parent::__construct();  
    }  
      
    public function login(){  
          
        // 在welcome的action中添加如下代码,即可用户登录情况  
        if($this->session->userdata('username')) redirect('Admin/success'); 
        $this->load->library('form_validation'); // 使用CI的表单验证, 如下:  
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');  
        $this->form_validation->set_rules('password', 'Password', 'min_length[4]|required');  
         
        if($this->form_validation->run() !== false){  
            // then validate password. Get from the Db.  
            $this->load->model('admin_model');  
            $res = $this->admin_model->verify_users(  
                                            $this->input->post('email'),  
                                           	$this->input->post('password')
                                        ); 
            var_dump($res);
            if($res !== false){  
                                        print_r($res);  
                $this->session->set_userdata('username', $this->input->post('email'));  
                $this->load->helper('url');
                redirect('Hello/success');   
            }  
            echo $this->db->last_query();
            $this->load->view('login_view');  
    	}else{
            echo "有未输入项或邮箱不正确或密码少于4位";
        }
    } 
      
    public function logout(){  
        $this->session->sess_destroy();  
        redirect('Index/index'); 
        //$this->load->view('login_view');  
    }  
}
