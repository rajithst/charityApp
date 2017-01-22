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

        $this->load->view('login');
    }
}