<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 2/3/17
 * Time: 9:50 PM
 */
class Profile extends  Admin_Controller {


    /**
     * Posts constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('Profile_m');

    }

    public function viewProfile($id){

        $data['profile']=$this->Profile_m->getProfileData($id);
        $this->load->view('templates/header');
        $this->load->view('profile',$data);
    }


    public function deleteProfile(){

        $id = $this->input->get('accid');
        $cb = $this->Profile_m->deleteProfile($id);

        echo $cb;
    }

    public function suspend(){

        $id = $this->input->get('accid');
        $cb = $this->Profile_m->suspendProfile($id);

        echo $cb;
    }

    public function setActive(){

        $id = $this->input->get('accid');
        $cb = $this->Profile_m->activeProfile($id);

        echo $cb;
    }



}