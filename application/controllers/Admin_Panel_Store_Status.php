<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Store_Status extends CI_Controller {
    
    public function index(){
        if($this->session->userdata("admin_id")){
            $data['store_status'] = $this->db->get_where('store_status', array('id' => 1))->result();
            $data['store_status'] = $data['store_status'][0];
            
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/store_status_index.php', $data);
            $this->load->view('admin_panel/footer');
            
            if($_POST){
                $update['status'] = $this->input->post('status');
                $this->db->update('store_status', $update, array('id' => 1));
                redirect('Admin_Panel_Store_Status/');
            }
        }else{
            redirect('Admin_Panel_Access/login');
        }
    }
}
