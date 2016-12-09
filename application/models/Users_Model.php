<?php

class Users_Model extends CI_Model {
	
	public $id;
	public $first_name;
        public $last_name;
        public $street_address;
        public $city;
        public $post_code;
        public $state;
	public $password;
	public $email;
	public $contact_no;
        public $join_date;
        public $active;
        public $salt;
	
	public function __construct()
	{
            parent::__construct();
	}
	
	public function get_all()
	{
            $query = $this->db->get('users');
            return $query->result();
	}
	
	public function get_data($id)
	{
            $query = $this->db->get_where('users', array('id' => $id));
            return $query->result();
	}
        
        
        public function get_data_by_email($email)
        {
            $query = $this->db->get_where('users', array('email' => $email));
            return $query->result();
        }

	public function login_verification($data)
        {
            $sql = "SELECT * FROM users WHERE email = ? AND password = SHA2(CONCAT(?,salt),256)";
            $users = $this->db->query($sql, array(
                                                 $data['email'],
                                                 $data['password']
                    ))->result_array();

        
            if (!count($users)) {  // check exist
                 return array(
                              "status" => false,
                              "message" => "Invalid"
                );
            }

            if ($users[0]['active'] == "0") { // check active
                return array(
                             "status" => false,
                             "message" => "Account deactivated"
                );
            }

            $this->session->set_userdata(array(
                                               "user_id" => $users[0]['id']
                                        ));
        
            return array(
                        "status" => true,
                        "user_id" => $users[0]['id']
            );
        }
        
        // Lack of username
	public function register_user($data)
        {
            $salt = rand(11111111, 99999999);

            $email = $this->db->get_where("users", array(
                                                        "email" => $data['email']
                                        ))->result_array();

            if(count($email))
            {
                return array(
                              "status" => false,
                              "message" => "User exists"
                            );
            }

            $sql = "INSERT into users (first_name, last_name, password,salt,email,contact_no,join_date,active, street_address, city, post_code, state) values ( ?,?,SHA2(CONCAT(?,?),512),?,?,?,?,? )";
            $this->db->query($sql, array(
                                        $data['first_name'],
                                        $data['last_name'],
                                        $data['password'],
                                        $salt,
                                        $salt,
                                        $data['email'],
                                        $data['contact_no'],
                                        $data['join_date'],
                                        $data['active'],
                                        $data['street_address'],
                                        $data['city'],
                                        $data['post_code'],
                                        $data['state']
                            ));
        
            $subscriber = $this->db->get_where("subscribers",array("email" => $data['email']))->result_array();
            
            if(!count($subscriber))
            {
                $subscriber_data = array(
                                        "email" => $data['email'],
                                   );
                $this->db->insert('subscribers', $subscriber_data);
            }
            return array(
                        "status" => true
            );
        }
	
	public function is_login()
        {
            if($this->session->userdata('user_id')){
                return true;
            }
            return false;
        }
}


