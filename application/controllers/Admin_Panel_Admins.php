<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Admins extends CI_Controller {

    public function index()
    {  
       if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['admins'] = $this->db->get_where('admins', array('active' => 1))->result();
       
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($this->input->post('delete')[$x]);
                    $x++;
                }
                redirect('Admin_Panel_Admins');
            }
       
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/admins_index', $data);
            $this->load->view('admin_panel/footer');
       }else{
            redirect('Admin_Panel_Access/login');
       }
    }
    
    public function delete($admin_id)
    {
        $data['active'] = 0;
        $this->db->where('id', $admin_id);
        $this->db->update('admins', $data);
    }
    
    public function add()
    {
        if($this->session->userdata("admin_id")){
            $data['password_error'] = false;
            $data['username_error'] = false;
        
            if($_POST){
                $admin['username'] = $this->input->post('admin_username');
                $admin['password'] = $this->input->post('admin_password');
                $admin['active'] = 1;
            
                if($this->check_admin($admin['username'])){
                    if($this->input->post('admin_password') == $this->input->post('admin_password_1')){
                        $this->register_admin($admin);
                        redirect('Admin_Panel_Admins');
                    }
                    else{
                        $data['password_error'] = true;
                        $data['password_error_message'] = 'Password does not match';
                    }
                    $data['username_error'] = true;
                    $data['username_error_message'] = 'Username is taken';
                }
            
            }
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/admin_add', $data);
            $this->load->view('admin_panel/footer');
        }else{
            redirect('Admin_Panel_Access/login');
        }
    }
  
    public function check_admin($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('admins');
   
        if($query->num_rows() > 0){
            return false;
        }
        return true;        
    }
    
    public function register_admin($data) {
        $salt = rand(11111111, 99999999);
        $user = $this->db->get_where("admins", array(
                    "username" => $data['username']
                ))->result_array();
        
        if (count($user)) {
            return array(
                "status" => false,
                "message" => "User exists"
            );
        }

        $sql = "INSERT into admins (username,password,salt, active) values ( ?,SHA2(CONCAT(?,?),512),?,? )";
        $this->db->query($sql, array(
            $data['username'],
            $data['password'],
            $salt,
            $salt,
            $data['active']
        ));


        return array(
            "status" => true
        );
    }

}