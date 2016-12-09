<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Members extends CI_Controller
{   
    public function Index()
    {
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['members'] = $this->db->get_where('users', array('active' => 1))->result();
        
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($this->input->post('delete')[$x]);
                    $x++;
                }
                redirect('Admin_Panel_Members');
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/members_index', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($member_id)
    {    
        $data['active'] = 0;
        $this->db->where('id', $member_id);
        $this->db->update('users', $data);
        
        $get_member_info = $this->db->get_where('users',array('id' => $member_id))->result();
        $this->db->delete('subscribers', array('email' => $get_member_info[0]->email));
    }
    
    
    public function edit($member_id)
    {
        if($this->session->userdata("admin_id")){
            $data['username_error'] = false;
            $data['email_error'] = false;
        
            $data['member'] = $this->db->get_where('users',array('id' => $member_id))->result();
        
            if($_POST){
                $member['username'] = $this->input->post('member_name');
                $member['first_name'] = $this->input->post('member_first_name');
                $member['last_name'] = $this->input->post('member_last_name');
                $member['city'] = $this->input->post('member_city');
                $member['post_code'] = $this->input->post('member_post_code');
                $member['state'] = $this->input->post('state');
                $member['email'] = $this->input->post('member_email');
                $member['contact_no'] = $this->input->post('member_contact');
                $member['address'] = $this->input->post('member_address');
            
           
                if($this->check_username($member['username'], $member_id)){
                    if($this->check_email($member['email'], $member_id)){
                        $this->db->update('users', $member, array('id' => $member_id));
                        redirect('Admin_Panel_Members');
                    }
                    else{
                        $data['email_error'] = true;
                        $data['email_error_message'] = 'email is taken';
                    }
                }
                else{
                    $data['username_error'] = true;
                    $data['username_error_message'] = 'username is taken';
                }
            }
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/member_edit' ,$data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function add()
    {
        if($this->session->userdata("admin_id")){
            $data['username_error'] = false;
            $data['email_error'] = false;
            $data['password_error'] = false;
        
            if($_POST){
                $member['salt'] = rand(11111111, 99999999);
            
                $member['username'] = $this->input->post('member_name');
                $member['first_name'] = $this->input->post('member_first_name');
                $member['last_name'] = $this->input->post('member_last_name');       
                $member['password'] = $this->input->post('member_password');
                $member['email'] = $this->input->post('member_email');
                $member['contact_no'] = $this->input->post('member_contact');
                $member['join_date'] = date("Y-m-d");
                $member['active'] = 1;
                $member['address'] = $this->input->post('member_address');
                $member['city'] = $this->input->post('member_city');
                $member['post_code'] = $this->input->post('member_post_code');
                $member['state'] = $this->input->post('state');
            
                if($this->check_username_without_id($member['username'])){
                    if($this->check_email_without_id($member['email'])){
                        if($member['password'] == $this->input->post('member_password_1')){
                            $sql = "INSERT into users (username, first_name, last_name, password,salt, email, contact_no, join_date, active, address, city, post_code, state) values (?,?,?,SHA2(CONCAT(?,?),512),?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            $this->db->query($sql, array(
                                                        $member['username'],
                                                        $member['first_name'],
                                                        $member['last_name'],
                                                        $member['password'],
                                                        $member['salt'],
                                                        $member['salt'],
                                                        $member['email'],
                                                        $member['contact_no'],
                                                        $member['join_date'],
                                                        $member['active'],
                                                        $member['address'],
                                                        $member['city'],
                                                        $member['post_code'],
                                                        $member['state']
                                                        ));
                            $subscriber['email'] = $member['email'];
                        
                            if($this->check_subscriber_without_id($subscriber['email'])){
                                $this->db->insert('subscribers', $subscriber);
                            }
                            redirect('Admin_Panel_Members');
                        }
                        else{
                            $data['password_error'] = true;
                            $data['password_error_message'] = 'password do not match';
                        }
                    }
                    else{
                        $data['email_error'] = true;
                        $data['email_error_message'] = 'email is taken';
                    }
                }
                else{
                    $data['username_error'] = true;
                    $data['username_error_message'] = 'username is taken';
                }
            
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/member_add', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function check_username($username, $id){
      
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        
        $original_member = $this->db->get_where('users', array('id' => $id))->result();
        
        if($query->num_rows() > 0 && ($original_member[0]->username != $username)){
            return false;
        }
        return true;        
    }
    
    public function check_email($email, $id){
        
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        
        $original_member = $this->db->get_where('users', array('id' => $id))->result();
        
        if($query->num_rows() > 0 && ($original_member[0]->email != $email)){
            return false;
        }
        return true;
    }
    
    public function check_username_without_id($username){
        
        $this->db->where('username', $username);
        $query = $this->db->get('users');
   
        if($query->num_rows() > 0){
            return false;
        }
        return true;        
    }
    
    public function check_email_without_id($email){
        
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        if($query->num_rows() > 0 ){
            return false;
        }
        return true;
    }
    public function check_subscriber_without_id($email){
        
        $this->db->where('email', $email);
        $query = $this->db->get('subscribers');

        if($query->num_rows() > 0 ){
            return false;
        }
        return true;
    }
    
    
}
