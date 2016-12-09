<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Applicants extends CI_Controller{

    public function index()
    {
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['applicants'] = $this->db->get('job_applicants')->result();
        
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($delete[x]);
                }
            
                redirect('Admin_Panel_Applicants');
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/applicants_index.php', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($id)
    {
       $this->db->delete('job_applicants', array('id' => $id));     
    }
    // One more display field
    public function edit($id)
    {
        if($this->session->userdata("admin_id")){
         
            if($_POST){
                
                $update['active'] = $this->input->post('active');
                $update['job_name'] = $this->input->post('job_name');
                $update['job_description'] = $this->input->post('job_description');
 
                $this->db->update('job_vacancy',$update, array('id' => $id));
                redirect('Admin_Panel_Careers');
            }
        
            $data['vacancy'] = $this->db->get_where('job_vacancy', array('id' => $id))->result();
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/vacancy_edit', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
}