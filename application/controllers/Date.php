<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date extends CI_Controller {
    
    public function get(){
        
        if($_POST){
            $data['date'] = $this->input->post('date');
            $data['y'] = substr($data['date'], 0,4);
            $data['m'] = substr($data['date'], 5,2);
            $data['d'] = substr($data['date'], 8,2);
            
            $get_timestamp = strtotime("{$data['y']}/{$data['m']}/{$data['d']}");
            $data['date'] = date("jS F Y", $get_timestamp);
            $data['html_date'] = "{$data['y']}-{$data['m']}-{$data['d']}";
   
            die(json_encode($data));
        }
    }
}

