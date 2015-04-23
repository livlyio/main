<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Twitter extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Tw_model','twmodel');
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page'] = 'Twitter';
        
        $this->load->library('pagination');

        $config['base_url'] = 'http://livly.io/admin/twitter/';
        $config['per_page'] = 20; 

        $segment = $this->uri->segment('3');
        if (!isset($segment) || $segment == NULL) {
            $start = '0';
            $stop = '20';
        } else {
            $start = ($segment - 20);
            $stop = $segment;
        }
        
        
        $arr['list'] = $this->twmodel->get_accts($stop,$start);
        $arr['total'] = $this->twmodel->count_accts();
        $config['total_rows'] = $arr['total'];
        
        $this->pagination->initialize($config); 
        
        $arr['pages'] = $this->pagination->create_links();
        
        $this->load->view('admin/vwManageTwitter',$arr);
    }

    public function doadd()
    {
        $user = 'dev';
      
        $arr['alias'] = "http://livly.io/".$this->twmodel->create($this->input->post('url'), $this->input->post('name'), $this->input->post('cat'), $user);
        $arr['url'] = $this->input->post('url');
        $arr['name'] = $this->input->post('name');
        $arr['cat'] = $this->input->post('cat');
        $arr['page'] = 'result';
        $this->load->view('admin/vwAddTwitter',$arr);        
        
    }

    public function add() {
        $arr['page'] = 'add';
        $this->load->view('admin/vwAddTwitter',$arr);
    }

     public function edit_Twitter() {
        $arr['page'] = 'Twitter';
        $this->load->view('admin/vwEditTwitter',$arr);
    }
    
     public function block_Twitter() {
        // Code goes here
    }
    
     public function delete_Twitter() {
        // Code goes here
    }
    
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */