<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    
    public function get(){
        $this->load->library('cart');
        
        if($_POST){
            $data['rowid'] = $this->input->post('rowid');
            
            foreach($this->cart->contents() as $cart){
                if($cart['rowid'] == $data['rowid']){
                    $data['quantity'] = $cart['qty'];
                    $data['price'] = $cart['price'];
                    $data['name'] = $cart['name'];
                }
            }
            $data['total'] = $this->cart->total();
            
            die(json_encode($data));
        }
    }
    
    public function checkout(){
        $this->load->library('cart');
        
        if($this->session->userdata('user_id')){
            if($_POST){
                $data['deliveryDate'] = $this->input->post('deliveryDate');
                $data['y'] = substr($data['deliveryDate'], 0,4);
                $data['m'] = substr($data['deliveryDate'], 5,2);
                $data['d'] = substr($data['deliveryDate'], 8,2);
                $data['deliveryLocation'] = $this->input->post('deliveryLocation');
            
                $get_timestamp = strtotime("{$data['y']}/{$data['m']}/{$data['d']}");
                $data['date'] = date("Y-m-d", $get_timestamp);
            
                foreach($this->cart->contents() as $cart){
                    $input['user_id'] = $this->session->userdata('user_id');
                    $input['product_id'] = $cart['id'];
                    $input['quantity'] = $cart['qty'];
                    $input['price'] = $cart['price'];
                    $input['transaction_status'] = 5;
                    $input['transaction_date'] = date('Y-m-d');
                    $input['delivery_request'] = $data['date'];
                    $input['delivery_location'] = $data['deliveryLocation'];
                    
                    $this->db->insert('transaction', $input);
                }
                $this->cart->destroy();

                die(json_encode($data));
            }
        }
    }
    
    public function edit(){
        $this->load->library('cart');
        
        if($_POST){
            $data['subtotal'] = 0;
            $data['rowid'] = $this->input->post('rowid');
            $data['quantity'] = $this->input->post('quantity');
            
            $update['rowid'] = $data['rowid'];
            $update['qty'] = $data['quantity'];
            
            $this->cart->update($update);
            
            foreach($this->cart->contents() as $cart){
                if($cart['rowid'] == $data['rowid']){
                    $data['total'] = $cart['price'] * $cart['qty'];
                   
                }
                $data['subtotal'] += ($cart['price'] * $cart['qty']);
            }
            
            die(json_encode($data));
        }
        
    }
     

    public function add(){
        
        $this->load->library('cart');
        
        if($_POST){
            $data['total_quantity'] = 0;
            $data['product_id'] = $this->input->post('product_id');
            $data['product_detail'] = $this->db->get_where('products', array('product_id'=> $data['product_id']))->result();
          
            $input['id'] = $data['product_detail'][0]->product_id;
            $input['name'] = $data['product_detail'][0]->product_name;
            $input['qty'] = 1;
            $input['price'] = $data['product_detail'][0]->product_price;
            
            $this->cart->insert($input);
            
            foreach($this->cart->contents() as $cart_content){
                $data['total_quantity'] += $cart_content['qty'];
            }
           
            die(json_encode($data));
            
        }
    }
    
    public function totalQuantity()
    {
        $this->load->library('cart');
       
        if($_POST){
            $data['input'] = $this->input->post('input');
            $data['quantity'] = 0;
            
            foreach($this->cart->contents() as $cart_content){
                $data['quantity'] += $cart_content['qty'];
            }
            
            die(json_encode($data));
        }
    }
}