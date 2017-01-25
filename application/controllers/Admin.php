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
    }

    public function index(){

        $this->load->view('templates/header');
        $this->load->view('login');
    }

    public function Dashboard(){


        $this->load->view('templates/header');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }

    public function pendingPosts(){


        $this->load->view('templates/header');
        $this->load->view('pendingpost');
        $this->load->view('templates/footer');
    }


    public function approvedPosts(){


        $this->load->view('templates/header');
        $this->load->view('approved');
        $this->load->view('templates/footer');
    }

    public function draftPosts(){


        $this->load->view('templates/header');
        $this->load->view('draft');
        $this->load->view('templates/footer');
    }
}