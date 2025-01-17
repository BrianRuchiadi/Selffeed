<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  
    public function index()
    {  
        $this->load->library('cart');
        
        $data['credit'] = false;
        $data['cart_full'] = false;
        
        $data['store_status'] = $this->db->get_where('store_status', array('id' => 1))->result();
        $data['store_status'] = $data['store_status'][0];
        
        if($this->session->userdata('user_id') != ''){
            if(count($this->cart->contents()) > 0){
                $data['cart_full'] = true;
            }
          
            $data['user'] = $this->session->userdata('user_id');
            $data['user_details'] = $this->users->get_data($this->session->userdata('user_id'));
            $data['credit'] = true;
            
        }
        
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('products_images','products.product_id = products_images.product_id' );
        $this->db->where('product_active = 1');
        $this->db->where('product_category = "MAIN"');
        
        $data['products'] = $this->db->get()->result();
        
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('products_images','products.product_id = products_images.product_id' );
        $this->db->where('product_active = 1');
        $this->db->where('product_category = "ADDON"');
        
        $data['add_ons'] = $this->db->get()->result();

        $this->load->view('static_pages/menu.php', $data);
    }
    
    public function details($product_id)
    {  
        $this->load->library('cart');
        
        $check = $this->db->get_where('products', array('product_id' =>$product_id))->result();
        if(count($check) > 0){
            $data['credit'] = false;
            $data['image_exists'] = false;
            $data['ingredient_exists'] = false;
            $data['cart_full'] = false;
        
            if($this->session->userdata("user_id") != ''){
                $data['credit'] = true;
                if(count($this->cart->contents()) > 0){
                    $data['cart_full'] = true;
                }
            }
            $data['product'] = $this->db->get_where('products', array('product_id' => $product_id))->result();
            $picture = $this->db->get_where('products_images', array('product_id' => $product_id))->result();
            $ingredients = $this->db->get_where('food_ingredients', array('product_id' => $product_id))->result();
        
            if(count($picture) == 1){
                $data['image_exists'] = true;
                $data['picture'] = $picture[0]->product_image;
            }
        
            if(count($ingredients) > 0){
                $this->db->select('*');
                $this->db->from('food_ingredients');
                $this->db->join('ingredients', 'food_ingredients.ingredient_id = ingredients.id');
                $this->db->where('food_ingredients.product_id = ', $product_id);
            
                $data['ingredients'] = $this->db->get()->result();
                $data['ingredient_exists'] = true;
            }
            
            $this->db->select('*');
            $this->db->from('products');
            $this->db->join('products_images','products.product_id = products_images.product_id' );
            $this->db->where('product_active = 1');
            $this->db->where('product_category = "ADDON"');
        
            $data['add_ons'] = $this->db->get()->result();
        }else{
            redirect('Menu');
        }
        
        $this->load->view('static_pages/details.php', $data);
    }
}
