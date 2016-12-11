<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Business  extends CI_Controller{

    public function index()
    {
        if($this->session->userdata("admin_id")){
            
            $x = 0;
            $data['number'] = 1;
            $data['inquiries'] = $this->db->get('business_inquiry')->result();
            
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($delete[x]);
                }
            
                redirect('Admin_Panel_Business');
            }
        
            $this->load->view('admin_panel/header.php');
            $this->load->view('admin_panel/business_index.php', $data);
            $this->load->view('admin_panel/footer.php');
        }
    }
    
    public function delete($id)
    {
        $this->db->delete('business_inquiry',array('id' => $id));     
    }
    
}