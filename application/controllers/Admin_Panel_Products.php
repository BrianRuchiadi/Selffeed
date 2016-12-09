<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Products extends CI_Controller
{   
    public function index()
    {
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['products'] = $this->db->get_where('products', array('product_active' => 1))->result();
       
            if($_POST){
                foreach($this->input->post('delete') as $delete){        
                    $this->delete($this->input->post('delete')[$x]);
                    $x++;
                }
                redirect('Admin_Panel_Products/index');
            }
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/products_index', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($product_id)
    {
        $data['product_active'] = 0;
        $this->db->where('product_id', $product_id);
        $this->db->update('products', $data);
    }
    
    public function edit($product_id)
    {
        if($this->session->userdata("admin_id")){
            // configuration of image upload path
       
            $data['image_exists'] = false;
            $data['ingredient_exists'] = false;
        
            $config['upload_path'] = './Image/products/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
            $this->load->library('upload', $config);

            $data['product'] = $this->db->get_where('products', array('product_id' => $product_id))->result();
            $picture = $this->db->get_where('products_images', array('product_id' => $product_id))->result();
            $ingredients = $this->db->get_where('food_ingredients', array('product_id' => $product_id))->result();
        
        
            if(count($picture) == 1){
                $data['image'] = $picture[0]->product_image;
                $data['image_exists'] = true;
            }
        
            if(count($ingredients) > 0){
            
                $this->db->select('*');
                $this->db->from('food_ingredients');
                $this->db->join('ingredients', 'food_ingredients.ingredient_id = ingredients.id');
                $this->db->where('food_ingredients.product_id = ', $product_id);
            
                $data['ingredients'] = $this->db->get()->result();
                $data['ingredient_exists'] = true;
            }
        
            if($_POST){
                $product['product_name'] = $this->input->post('product_name');
                $product['product_quantity'] = $this->input->post('product_quantity');
                $product['product_price'] = $this->input->post('product_price');
                $product['product_description'] = $this->input->post('product_description');
                $product['product_brief_description'] = $this->input->post('product_brief_description');
            
                if($this->input->post('ingredients_bucket') != ''){
                    $this->db->where('product_id', $product_id);
                    $this->db->delete('food_ingredients');
                
                    foreach($this->input->post('ingredients_bucket') as $ingredient_id){
                        $ingredient['product_id'] = $product_id;
                        $ingredient['ingredient_id'] = $ingredient_id;
                
                        $this->db->insert('food_ingredients', $ingredient);
                    }
                }
            
                if(!$_FILES['product_image']['name'] == "" )
                {
                    // upload image to folder  
                    $this->upload->do_upload('product_image');
                    $image['product_id'] = $product_id;
                    $image['product_image'] = './Image/products/';
                    $image['product_image'] .= $_FILES['product_image']['name'];
                
                    $getImageData = $this->db->get_where('products_images', array('product_id' => $product_id))->result();
               
                    if(count($getImageData) == 1){
                        $this->db->update('products_images', $image, array('id' => $getImageData[0]->id));
                    } else {
                        $this->db->insert('products_images', $image);
                    }
                
     
                }
                $this->db->update('products', $product, array('product_id' => $product_id));
                redirect('Admin_Panel_Products');
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/product_edit', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function add()
    {
        if($this->session->userdata("admin_id")){
            // configuration of image upload path
            $config['upload_path'] = './Image/products/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
            $this->load->library('upload', $config);
        
            if($_POST)
            {
   
                $data['product_name'] = $this->input->post('product_name');
                $data['product_quantity'] = $this->input->post('product_quantity');
                $data['product_active'] = 1;
                $data['product_price'] = $this->input->post('product_price');
                $data['upload_date'] = date("Y-m-d");
                $data['product_description'] = $this->input->post('product_description');
                $data['product_brief_description'] = $this->input->post('product_brief_description');
            
                $this->db->insert('products',$data);
            
                $insert_id = $this->db->insert_id();
            
                if($this->input->post('ingredients_bucket') != ''){
                    foreach($this->input->post('ingredients_bucket') as $ingredient_id){
                        $ingredient['product_id'] = $insert_id;
                        $ingredient['ingredient_id'] = $ingredient_id;
                
                        $this->db->insert('food_ingredients', $ingredient);
                    }
                }
            
                if(!$_FILES['product_image']['name'] == '')
                {   
                    // upload image to folder
                    $this->upload->do_upload('product_image');
                
                    $image['product_id'] = $insert_id;
                    $image['product_image'] = './Image/products/';
                    $image['product_image'] .= $_FILES['product_image']['name'];
                
                    $this->db->insert('products_images', $image);
                }
       
                redirect('Admin_Panel_Products/index');
            
            }
        
            $content['ingredients'] = $this->db->get('ingredients')->result();
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/product_add',$content);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
 
}
