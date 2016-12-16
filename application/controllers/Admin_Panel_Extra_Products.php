<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Extra_Products extends CI_Controller{
    
    public function index()
    {
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['products'] = $this->db->get_where('products', array('product_category' => 'ADDON'))->result();
        
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($this->input->post('delete')[$x]);
                    $x++;
                }
            
                redirect('Admin_Panel_Extra_Products');
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/extra_products_index.php', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($product_id)
    {
        die(var_dump($product_id));
        $update['product_active'] = 0;
        $this->db->update('products', $update, array('product_id' => $products_id));
      
    }
    
    public function edit($product_id)
    {
        if($this->session->userdata("admin_id")){
            // configuration of image upload path
            $config['upload_path'] = './Image/extra_products/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
            $this->load->library('upload', $config);
        
            if($_POST){
                $update['product_name'] = $this->input->post('product_name');
                $update['product_price'] = $this->input->post('product_price');
                $update['product_active'] = $this->input->post('product_active');
                
                $this->db->update('products', $update, array('product_id' => $product_id));
            
                if(!$_FILES['product_image']['name'] == ''){
                
                    $this->upload->do_upload('product_image');
                
                    $image['product_image'] = './Image/extra_products/';
                    $image['product_image'] .= $_FILES['product_image']['name'];
                    
                    $this->db->update('products_images', $image, array('product_id' => $product_id));
                } 

                redirect('Admin_Panel_Extra_Products');
            }
        
            $data['products'] = $this->db->get_where('products', array('product_id' => $product_id))->result();
            $picture = $this->db->get_where('products_images', array('product_id' => $product_id))->result();
            
            if(count($picture) > 0){
                $data['images'] = $this->db->get_where('products_images', array('product_id' => $product_id))->result();
                $data['images'] = $data['images'][0];
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/extra_product_edit', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function add()
    {
        if($this->session->userdata("admin_id")){
            // configuration of image upload path
            $config['upload_path'] = './Image/extra_products/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
            $this->load->library('upload', $config);
        
            if($_POST){
            
                $data['product_name'] = $this->input->post('product_name');
                $data['product_price'] = $this->input->post('product_price');
                $data['upload_date'] = date("Y-m-d");
                $data['product_active'] = 1;
                $data['product_category'] = "ADDON";
                
                $this->db->insert('products', $data);
                $insert_id = $this->db->insert_id();
            
                if(!$_FILES['product_image']['name'] == '')
                {   
                    // upload image to folder
                    $this->upload->do_upload('product_image');
                    
                    $image['product_id'] = $insert_id;
                    $image['product_image'] = './Image/extra_products/';
                    $image['product_image'] .= $_FILES['product_image']['name'];
                    
                    $this->db->insert('products_images', $image);
                }

                redirect('Admin_Panel_Extra_Products');
            }
        
            $this->load->view('admin_panel/header.php');
            $this->load->view('admin_panel/extra_product_add.php');
            $this->load->view('admin_panel/footer.php');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    

}