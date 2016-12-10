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
        
            $this->load->view('admin_panel/header.php');
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
   public function details($id)
   {
       if($this->session->userdata("admin_id")){
           $data['job_applicant'] = $this->db->get_where('job_applicants', array('id' => $id))->result();
           $data['job_applicant'] = $data['job_applicant'][0];
           
           $update['read'] = 1;
           $this->db->update('job_applicants', $update, array('id' => $id));
           
           $this->load->view('admin_panel/header');
           $this->load->view('admin_panel/applicant_details.php', $data);
           $this->load->view('admin_panel/footer');
           
          
       } else {
           redirect('Admin_Panel_Access/login');
       }
   }
   
   public function download_resume($id){
       
       $data['job_applicant'] = $this->db->get_where('job_applicants', array('id' => $id))->result();
       $data['job_applicant'] = $data['job_applicant'][0];
       
       $this->load->helper('download');
           
           if($data['job_applicant']->resume != ''){
               force_download($data['job_applicant']->resume, NULL);
           }
       
   }
   
    public function download_coverLetter($id){
       
       $data['job_applicant'] = $this->db->get_where('job_applicants', array('id' => $id))->result();
       $data['job_applicant'] = $data['job_applicant'][0];
       
       $this->load->helper('download');
           
           if($data['job_applicant']->coverLetter != ''){
               force_download($data['job_applicant']->coverLetter, NULL);
           }
       
   }
}