<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	
    public function index(){
        if($this->session->userdata("user_id")){
            $this->load->library('cart');
            $data['total'] = 0;

            $data['cart_content'] = $this->cart->contents();
            
            $data['user'] = $this->db->get_where('users', array('id' => $this->session->userdata("user_id")))->result();
            
            foreach($data['cart_content'] as $cart){
                $data['total'] += ($cart['qty'] * $cart['price']);
            }
            
            $data['homeAddress'] = false;
            $data['workAddress'] = false;
            
            $data['homeData'] = $this->db->get_where('users_optional_address', array('user_id' => $this->session->userdata("user_id"), 'address_type' => 'home'))->result();
            $data['workData'] = $this->db->get_where('users_optional_address', array('user_id' => $this->session->userdata("user_id"), 'address_type' => 'work'))->result();
            
            if(count($data['homeData']) == 1){
                $data['homeAddress'] = true;
                $data['homeData'] = $data['homeData'][0];
            }
            if(count($data['workData']) == 1){
                $data['workAddress'] = true;
                $data['workData'] = $data['workData'][0];
            }
            $data['grand_total'] = $data['total'] + number_format(($data['total'] * 0.06), 2);
            $this->load->view('checkout/checkout.php', $data);
        }
        else{
            redirect('Home');
        }
    }
    
    
}