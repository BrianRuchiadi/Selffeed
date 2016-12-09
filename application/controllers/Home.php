<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index($option = '')
    {     
        $data['register'] = false;
        $data['login'] = false;
        
        if($option == 'register'){   
            $data['register'] = true;
        }
        
        if($option == 'login'){
            $data['login'] = true;
        }
        
        $this->load->view('static_pages/index.php', $data);
    }
    
  
}
