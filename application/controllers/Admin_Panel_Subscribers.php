<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Subscribers extends CI_Controller
{
    public function index(){
        
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['subscribers'] = $this->db->get('subscribers')->result();
        
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($this->input->post('delete')[$x]);
                    $x++;
                }
                redirect('Admin_Panel_Subscribers');
            }
        
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/subscribers_index', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($subscriber_id){       
        $this->db->delete('subscribers', array('id' => $subscriber_id));     
    }
    
    public function add(){
        
        if($this->session->userdata("admin_id")){
            $data['email_error'] = false;
        
            if($_POST){
                $subscriber['email'] = $this->input->post('subscriber_email');
            
                if($this->check_email_without_id($subscriber['email'])){
                    $this->db->insert('subscribers', $subscriber);
                    redirect('Admin_Panel_Subscribers');
                }
                else{
                    $data['email_error'] = true;
                    $data['email_error_message'] = 'subscriber already exists!';
                }
            }
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/subscriber_add', $data);
            $this->load->view('admin_panel/footer');
        } else{
            redirect('Admin_Panel_Access/login');
        }
    }
    
    // Checking email from subscribers table
    public function check_email_without_id($email){
        
        $this->db->where('email', $email);
        $query = $this->db->get('subscribers');

        if($query->num_rows() > 0 ){
            return false;
        }
        return true;
    }
}
