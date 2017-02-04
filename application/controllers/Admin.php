<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 1/22/17
 * Time: 10:02 PM
 */
class Admin extends Admin_Controller {


    /**
     * Admin constructor.
     */
    public function __construct(){
        parent::__construct();

        $this->load->model('Post_m');
    }

    public function index(){

        $this->load->view('login');
    }

    public function Dashboard(){


        $this->load->view('templates/header');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }

    public function pendingPosts(){

        $data['pending']=$this->Post_m->getPendingPosts();
        $this->load->view('templates/header');
        $this->load->view('pendingpost',$data);

    }


    public function approvedPosts(){

        $data['approved']=$this->Post_m->getApprovedPosts();
        $this->load->view('templates/header');
        $this->load->view('approved',$data);

    }

    public function draftPosts(){

        $data['draft']=$this->Post_m->getDraftedPosts();
        $this->load->view('templates/header');
        $this->load->view('draft',$data);

    }


}