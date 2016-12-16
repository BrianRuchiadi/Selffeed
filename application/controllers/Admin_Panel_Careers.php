<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Careers extends CI_Controller{
    
    public function index()
    {
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['vacancies'] = $this->db->get('job_vacancy')->result();
        
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($this->input->post('delete')[$x]);
                    $x++;
                }
            
                redirect('Admin_Panel_Careers');
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/vacancy_index.php', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($id)
    {
        $data['active'] = 0;
        $this->db->where('id', $id);
        $this->db->update('job_vacancy', $data);
        
    }
    
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
    
    public function add()
    {
        if($this->session->userdata("admin_id")){
        
            if($_POST){
            
                $data['job_name'] = $this->input->post('job_name');
                $data['job_description'] = $this->input->post('job_description');
                $data['active'] = 1;

                $this->db->insert('job_vacancy', $data);
                redirect('Admin_Panel_Careers');
            }
        
            $this->load->view('admin_panel/header.php');
            $this->load->view('admin_panel/vacancy_add.php');
            $this->load->view('admin_panel/footer.php');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
}