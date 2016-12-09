<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Access extends CI_Controller {

    public function login()
    {  
        $data['error'] = false;
        
        if($_POST){
           $data['username'] = $this->input->post('username');
           $data['password'] = $this->input->post('password');
           
           if($this->check_user($data)['status'] == true){
               redirect('Admin_Panel_Products');
           }
           else{
               $data['error'] = true;
               $data['error_message'] = 'Invalid username or password';
           }
        }
        $this->load->view('admin_panel/login', $data);
    }
    
    public function logout()
    {
        $this->session->unset_userdata("admin_id");
        return redirect('Admin_Panel_Access/login');
    }
    
    public function check_user($data){
        $sql = "SELECT * FROM admins WHERE username = ? AND password = SHA2(CONCAT(?,salt),512)";
        $users = $this->db->query($sql, array(
                    $data['username'],
                    $data['password']
                 ))->result_array();

        
        if (!count($users)) {  // check exist
            return array(
                "status" => false,
                "message" => "Invalid"
            );
        }

        if($users[0]['active'] == "0") { // check active
            return array(
                "status" => false,
                "message" => "Account deactivated"
            );
        }

        $this->session->set_userdata(array(
            "admin_id" => $users[0]['id']
        ));
        return array(
            "status" => true,
            "admin_id" => $users[0]['id']
        );
    }
}