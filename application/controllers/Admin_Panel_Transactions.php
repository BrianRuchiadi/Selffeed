<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel_Transactions extends CI_Controller {
    
    public function index(){
        if($this->session->userdata("admin_id")){
            $x = 0;
            $data['number'] = 1;
            $data['transactions'] = $this->db->get('transaction')->result();
        
            if($_POST){
                foreach($this->input->post('delete') as $delete){
                    $this->delete($this->input->post('delete')[$x]);
                    $x++;
                }
                redirect('Admin_Panel_Transactions');
            }
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/transactions_index.php', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    public function delete($id){
        $data['transaction_status'] = 6;
        $this->db->update('transaction',$data, array('id' => $id));
    }
    
    public function edit($id){
        
        if($this->session->userdata("admin_id")){
            $data['transaction'] = $this->db->get_where('transaction', array('id' => $id))->result();
        
            if($_POST){
                $input['quantity'] = $this->input->post('quantity');
                $input['price'] = $this->input->post('price');
                $input['transaction_status'] = $this->input->post('status');
            
                $this->db->update('transaction', $input, array('id'=>$id));
                redirect('Admin_Panel_Transactions');
            }
            $this->load->view('admin_panel/header');
            $this->load->view('admin_panel/transaction_edit.php', $data);
            $this->load->view('admin_panel/footer');
        } else {
            redirect('Admin_Panel_Access/login');
        }
    }
    
    
}