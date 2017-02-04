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
        $this->load->Profile_m();

    }

    public function viewProfile($id){

        $data['profile']=$this->Profile_m->getProfileData($id);
        $this->load->view('templates/header');
        $this->load->view('profile',$data);
    }


}