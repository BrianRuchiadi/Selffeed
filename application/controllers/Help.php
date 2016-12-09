<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {
    
    public function index(){
        
        if($this->session->userdata('user_id')){
            $this->load->view('static_pages/help.php');
        }
        else{
            redirect('Home');
        }
    }
}