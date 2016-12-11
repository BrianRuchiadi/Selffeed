<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Ingredients extends CI_Controller{
    
    public function index()
    {
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['ingredients'] = $this->db->get('ingredients')->result();
        
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($delete[x]);
                }
            
                redirect('Admin_Panel_Ingredients');
            }
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/ingredients_index.php', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($ingredient_id)
    {
        $this->db->delete('ingredients', array('id' => $ingredient_id));
    }
    
    public function edit($ingredient_id)
    {
        if($this->session->userdata("admin_id")){
            // configuration of image upload path
            $config['upload_path'] = './Image/ingredients/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
            $this->load->library('upload', $config);
        
            if($_POST){
                $update['name'] = $this->input->post('ingredient_name');
                $update['price'] = $this->input->post('ingredient_price');
            
                if(!$_FILES['ingredient_image']['name'] == ''){
                
                    $this->upload->do_upload('ingredient_image');
                
                    $update['picture'] = './Image/ingredients/';
                    $update['picture'] .= $_FILES['ingredient_image']['name'];
                } 
            
                $this->db->update('ingredients',$update, array('id' => $ingredient_id));
                redirect('Admin_Panel_Ingredients');
            }
        
            $data['ingredient'] = $this->db->get_where('ingredients', array('id' => $ingredient_id))->result();
        
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/ingredient_edit', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function add()
    {
        if($this->session->userdata("admin_id")){
            // configuration of image upload path
            $config['upload_path'] = './Image/ingredients/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        
            $this->load->library('upload', $config);
        
            if($_POST){
            
                $data['name'] = $this->input->post('ingredient_name');
                $data['price'] = $this->input->post('ingredient_price');
            
                if(!$_FILES['ingredient_image']['name'] == '')
                {   
                    // upload image to folder
                    $this->upload->do_upload('ingredient_image');

                    $data['picture'] = './Image/ingredients/';
                    $data['picture'] .= $_FILES['ingredient_image']['name'];
                 
                }
            
                $this->db->insert('ingredients', $data);
                redirect('Admin_Panel_Ingredients');
            }
        
            $this->load->view('admin_panel/header.php');
            $this->load->view('admin_panel/ingredient_add.php');
            $this->load->view('admin_panel/footer.php');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function search(){
        
        if($_POST){
            $data['input'] = $this->input->post('input');
            
            $this->db->select('*');
            $this->db->from('ingredients');
            $this->db->like('name', $data['input'], 'both');
            $result = $this->db->get()->result();
            
            $data['count'] = count($result);
            
            if($data['input'] == ''){
                $data['count'] = 0;
                $data['result'] = 0;
            }
            
            else if(count($data['count']) > 0){
                $data['result'] = $result;
            }
            die(json_encode($data));
        }
    }
    
    public function get(){
        
        if($_POST){
            $data['id'] = $this->input->post('id');

            $data['result'] =  $this->db->get_where('ingredients' , array('id' => $data['id']))->result();
            
            die(json_encode($data));
        }
    }
}