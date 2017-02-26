<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 2/3/17
 * Time: 9:50 PM
 */
class  Users extends  Admin_Controller {


    /**Profile
     * Posts constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('User_m');

    }


    public function index(){
        $data['log'] = $this->User_m->all();
        $this->load->view('templates/header');
        $this->load->view('systemusers',$data);
    }


    public function addUser(){


        $data = array(
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'userlevel' => $this->input->post('role')
        );
        $log = $this->User_m->add($data);
        if ($log){
            $data['succ'] = "<div class='alert alert-success' id='success-alert'>
                            <button type='button' class='close' data-dismiss='alert'>x</button>
                            <center><h3>Success!</h3>
                You have been addred new User <br></center>
                        </div>";
            $data['log'] = $this->User_m->all();
            $this->load->view('templates/header');
            $this->load->view('systemusers',$data);
        }


    }




}