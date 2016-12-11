<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informations extends CI_Controller {
    
    public function questionAndAnswer(){
        $this->load->view('static_pages/questionAndAnswers.php');
    }
    
    public function career($career = ''){
        $config['upload_path'] = './CV_and_Resume/';
        $config['allowed_types'] = 'pdf|docx';
        $this->load->library('upload', $config);
        if($career  == ''){
            $data['vacancies'] = $this->db->get_where('job_vacancy', array('active' => 1))->result();
            $this->load->view('static_pages/careerList.php', $data);
        }
        else{
            $data['vacancy'] = $this->db->get_where('job_vacancy', array('active' => 1, 'id' => $career))->result();
            
            if(count($data['vacancy']) == 1){
                $data['firstNameError'] = false;
                $data['lastNameError'] = false;
                $data['emailError'] = false;
                $data['phoneError'] = false;
                $data['resumeError'] = false;
                $data['howDidError'] = false;
                $data['whyUsError'] = false;
                $data['whyThisError'] = false;
                $data['howYouError'] = false;
                
                if($_POST){
                    
                   
                    
                    if($this->input->post('firstName') != ''){
                        if($this->input->post('lastName') != ''){
                            if($this->input->post('email') != ''){
                                if($this->input->post('phone') != ''){
                                    if($this->input->post('howDid') != ''){
                                        if($this->input->post('whyUs') != ''){
                                            if($this->input->post('whyThis') != ''){
                                                if($this->input->post('howYou') != ''){
    
                                                    if(!$_FILES['resume']['name'] == ''){
                                                        // upload image to folder                
                                                        $this->upload->do_upload('resume');
                                                        $insert['job_number'] = $career;
                                                        $insert['resume'] = "./CV_and_Resume/{$_FILES['resume']['name']}";
                                                        $insert['firstName'] = $this->input->post('firstName');
                                                        $insert['lastName'] = $this->input->post('lastName');
                                                        $insert['email'] = $this->input->post('email');
                                                        $insert['phone'] = $this->input->post('phone');
                                                        $insert['linkedln'] = $this->input->post('linkedln');
                                                      
                                                        
                                                        if(!$_FILES['coverLetter']['name'] == ''){
                                                            $insert['coverLetter'] = './CV_and_Resume/';
                                                            $insert['coverLetter'] .= $_FILES['coverLetter']['name'];                             
                                                        }
                                                        
                                                        $insert['howDid'] = $this->input->post('howDid');
                                                        $insert['whyUs'] = $this->input->post('whyUs');
                                                        $insert['whyThis'] = $this->input->post('whyThis');
                                                        $insert['howYou'] = $this->input->post('howYou');

                                                        $this->db->insert('job_applicants', $insert);
                                                        redirect('Informations/success');
                                                       
                                                        }else{
                                                        $data['resumeError'] = true;
                                                    }
                                                    
                                                }else{
                                                    $data['howYouError'] = true;
                                                }
                                            }else{
                                                $data['whyThisError'] = true;
                                            }
                                        }else{
                                            $data['whyUsError'] = true;
                                        }
                                    }else{
                                        $data['howDidError'] = true;
                                    }
                                }else{
                                    $data['phoneError'] = true;
                                }
                            }else{
                                $data['emailError'] = true;
                            }
                        }else{
                            $data['lastNameError'] = true;
                        }
                    }else{
                        $data['firstNameError'] = true;
                    }
                }
                
                $this->load->view('static_pages/applicantForm.php', $data);
            }else{
                redirect('Home');
            }
        }
    }
    public function success(){
        $this->load->view('static_pages/success.php');
    }
    
    public function business(){
        if($_POST){
  
            $insert['email'] = $this->input->post('email');
            $insert['details'] = $this->input->post('details');
            
            $this->db->insert('business_inquiry', $insert);
            redirect('Home');
        }
        $this->load->view('static_pages/business.php');
    }
}