<?php

class user extends CI_controller{

    function index() {
        $this->load->model('User_model');
        $users = $this->User_model->all();
        $data = array();
        $data['users'] = $users;
        $this->load->view('list',$data);
    }


    function create(){
        $this->load->model('User_model');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        
        if($this->form_validation->run()==false){
            $this->load->view('create');
        }
        else{
            //save record to database
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $formArray['created_at'] = date('y-m-d');
            $this->User_model->create($formArray);
            $this->session->set_flashdata('success','Record added successfully');
            redirect(base_url().'index.php/user/index');
        }
        
    }
    function edit($userID)
    {
        $this->load->model('User_model');
        $users = $this->User_model->getUser($userID);
        $data = array();
        $data['users'] = $users;

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');

        if( $this->form_validation->run() == false){
            $this->load->view('edit',$data);

        }
        else{
            //update user record
            $formArray = array();
            $formArray['name'] = $this->input->post('name');
            $formArray['email'] = $this->input->post('email');
            $this->User_model->updateUser($userID,$formArray);
            $this->session->set_flashdata('success','Record Updated successfully');
            redirect(base_url().'index.php/user/index');
        } 
    }
    function delete($userID)
    {
        $this->load->model('User_model');
        $users = $this->User_model->getUser($userID);
        if(empty($users)){
            $this->session->set_flashdata('failure','Record not found in database');
            redirect(base_url().'index.php/user/index');
        }
        $this->User_model->deleteUser($userID);
        $this->session->set_flashdata('success','Record deleted successfully');
        redirect(base_url().'index.php/user/index');
    }
}

?>