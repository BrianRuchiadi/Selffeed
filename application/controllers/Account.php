<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
    
    public function index(){
        
        if($this->session->userdata("user_id")){
            $data['user'] = $this->users->get_data($this->session->userdata("user_id"));
            
            if($_POST){
                
                if($this->input->post('email') != '' && $this->input->post('phone') != '' && $this->input->post('phone') != '')
                {
                    $salt = rand(11111111, 99999999);
                    $data['id'] = (int)$this->session->userdata('user_id');
                    $data['first_name'] = $this->input->post('firstName');
                    $data['last_name'] = $this->input->post('lastName');
                    $data['email'] = $this->input->post('email');
                    $data['contact_no'] = $this->input->post('phone');
                    $data['password'] = $this->input->post('password');
                
                    $sql = "UPDATE users SET first_name = ?, last_name = ? , email = ?, contact_no = ?, password = SHA2(CONCAT(?,?),256) , salt = ? WHERE id = ?";
                    $this->db->query($sql, array(
                                                $data['first_name'],
                                                $data['last_name'],
                                                $data['email'],
                                                $data['contact_no'],
                                                $data['password'],
                                                $salt,
                                                $salt,
                                                $data['id']
                                    ));
                }else{
                    $input['first_name'] = $this->input->post('firstName');
                    $input['last_name'] = $this->input->post('lastName');
                    $this->db->update('users', $input, array('id' => $this->session->userdata('user_id')));
                }
                redirect('Account');
            }
            $this->load->view('account/edit_profile.php', $data);        
            
        }else{
            redirect('Home');
        }
    }
    
    public function payment(){
        if($this->session->userdata("user_id")){
            $this->load->view('account/payment.php');
        }
        else{
            redirect('Home');
        }
        
    }
    
    // not yet
    public function delivery(){
        if($this->session->userdata("user_id")){
            $data['user'] = $this->users->get_data($this->session->userdata("user_id"));
            // discover if user home address and work address already exists, and action to be taken accordingly
            $data['homeData'] = $this->db->get_where('users_optional_address', array('user_id'=> (int)$this->session->userdata("user_id"),'address_type' => 'home'))->result();   
            $data['workData'] = $this->db->get_where('users_optional_address', array('user_id'=> $this->session->userdata("user_id"), 'address_type' => 'work'))->result();
            
            $data['homeAddress'] = false;
            $data['workAddress'] = false;
            
            if(count($data['homeData']) == 1){
               $data['homeAddress'] = true;
               $data['homeData'] = $data['homeData'][0];
            }
            if(count($data['workData']) == 1){
                $data['workAddress'] = true;
                $data['workData'] = $data['workData'][0];
            }
       
            // end of checking
            if($_POST){
                
                if($this->input->post('main_address') == 1){
                    
                    $update['address'] = $this->input->post('user_address');
                    $update['state'] = $this->input->post('state');
                    $update['city'] = $this->input->post('user_city');
                    $update['post_code'] = $this->input->post('user_post_code');
                
                    $this->db->where('id', $this->session->userdata("user_id"));
                    $this->db->update('users',$update);
                    redirect('Account/delivery');
                }
                if($this->input->post('home_address') == 1){
                    $update['address'] = $this->input->post('user_address');
                    $update['state'] = $this->input->post('state');
                    $update['city'] = $this->input->post('user_city');
                    $update['postcode'] = $this->input->post('user_post_code');
                    
                    if($data['homeAddress'] == true){
                        $this->db->update('users_optional_address', $update, array('user_id' => $this->session->userdata("user_id"), 'address_type' => 'home'));   
                    }else{
                        $update['user_id'] = $this->session->userdata('user_id');
                        $update['address_type'] = 'home';
                        $this->db->insert('users_optional_address', $update);
                    }    
                    redirect('Account/delivery');
                }
                if($this->input->post('work_address') == 1){
                    $update['address'] = $this->input->post('user_address');
                    $update['state'] = $this->input->post('state');
                    $update['city'] = $this->input->post('user_city');
                    $update['postcode'] = $this->input->post('user_post_code');

                    if($data['workAddress'] == true){
                        $this->db->update('users_optional_address', $update, array('user_id' => $this->session->userdata("user_id"), 'address_type' => 'work'));   
                    }else{
                        $update['user_id'] = $this->session->userdata('user_id');
                        $update['address_type'] = 'work';
                        $this->db->insert('users_optional_address', $update);
                    }    
                    redirect('Account/delivery');
                }
                

            }
            $this->load->view('account/address.php', $data);
            
        }
        else{
            redirect('Home');
        }
    }
    
    public function orders(){
        if($this->session->userdata("user_id")){
            $data['order'] = false;
            
            $getData = $this->db->get_where('transaction', array('user_id' => $this->session->userdata("user_id")))->result();
            
            if(count($getData) > 0){
                $data['order'] = true;    
                $data['no'] = 1;
              
                $this->db->select('products.product_name, transaction.*');
                $this->db->from('transaction');
                $this->db->join('products','transaction.product_id = products.product_id');
                $this->db->where('transaction.user_id', $this->session->userdata("user_id"));
                
                $data['my_order'] = $this->db->get()->result();
            }
            
            $this->load->view('account/orders.php', $data);
        }
        else{
            redirect('Home');
        }
    }
    public function login()
    {
        if($_POST)
        {
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            
            $data['result'] = $this->users->login_verification($data);
            die(json_encode($data));
            
        }
    }
    
    public function check_user()
    {
        if($_POST)
        {
            $data['email'] = $this->input->post('email');
            
            $data['result'] = $this->users->get_data_by_email($data['email']);
            $data['count'] = count($data['result']);
            die(json_encode($data));
        }
    }
    
    public function logout()
    {  
        $data['unset_session'] = $this->session->unset_userdata("user_id");
        redirect('Home');
        
    }
    
    public function redirect_to_sign_in()
    {
        if($_POST){
            $this->session->set_userdata("sign_in", 1);
        }
    }
    
    public function register()
    {
        if($_POST){
            $insert['password'] = $this->input->post('password');
            $insert['salt'] = rand(11111111, 99999999);
            $insert['email'] = $this->input->post('email');
            $insert['first_name'] = $this->input->post('first_name');
            $insert['last_name'] = $this->input->post('last_name');
            $insert['contact_no'] = $this->input->post('contact_no');
            $insert['join_date'] = date("Y-m-d");
            $insert['address'] = $this->input->post('address');
            $insert['active'] = 1;
            $insert['city'] = $this->input->post('city');
            $insert['state'] = $this->input->post('state');
            $insert['post_code'] = $this->input->post('post_code');
            $sql = 'INSERT into users (password,salt,email,first_name,last_name,contact_no,join_date,address,active,city,state,post_code) values (SHA2(CONCAT(?,?),256),?,?,?,?,?,?,?,?,?,?,?)';
            $this->db->query($sql, array(
                                        $insert['password'],
                                        $insert['salt'],
                                        $insert['salt'],
                                        $insert['email'],
                                        $insert['first_name'],
                                        $insert['last_name'],
                                        $insert['contact_no'],
                                        $insert['join_date'],
                                        $insert['address'],
                                        $insert['active'],
                                        $insert['city'],
                                        $insert['state'],
                                        $insert['post_code']
                                        ));
            
            //$insert['result'] = $this->users->login_verification($insert['email'], $insert['password']);
            die(json_encode($insert));
        }
    }
    
    public function send_reset_email(){
        if($_POST){
            
            $this->load->library('email');
            
            $data['email'] = $this->input->post('email');
            
            $data['result'] = $this->users->get_data_by_email($data['email']);
            $data['count'] = count($data['result']);
            $data['valid'] = true;
            if($data['count'] == 1){
               $user['new_password'] = rand(1111111,9999999);
               $user['salt'] = rand(11111111, 99999999);
               //$data['password'] = $user['new_password'];
               
               $sql = 'UPDATE users SET password = SHA2(CONCAT(?,?),256) , salt = ? WHERE email = ?';
               $this->db->query($sql, array(
                                            $user['new_password'],
                                            $user['salt'],
                                            $user['salt'],
                                            $data['email']
                                            ));
               $this->load->model('Email_Model');
               $data['email'] = $this->Email_Model->sendMail($data['email'], 'Forgot password', "Hi, Our valuable customer, here is your resetted password : {$user['new_password']}, please sign in to change. ");
            }
            else{
                $data['valid'] = false;
                $data['email_invalid'] = 'User does not exists';
            }
            die(json_encode($data));
        }
    }
  
}
