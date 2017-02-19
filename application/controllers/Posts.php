<?php

/**
 * Created by PhpStorm.
 * User: rajith
 * Date: 1/28/17
 * Time: 4:46 PM
 */
class Posts extends Admin_Controller {


    /**
     * Posts constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('Post_m');
    }


    public function publishPost($id = NULL){


        if (is_null($id)){

            $id = $this->input->get('postid');
            $cb = $this->Post_m->addtoPublish($id);

            echo $cb;
        } else{

            $cb = $this->Post_m->addtoPublish($id);
            if ($cb){
                
                $msg = "<div class='alert alert-success' id='success-alert'>
                            <button type='button' class='close' data-dismiss='alert'>x</button>
                            <center><h3>Success!</h3>
                You have been publish post <br><a href=".base_url('index.php/Approved').">Undo changes?</a></center>
                        </div>";


                $this->readPost($id,$msg);
            }
        }




    }

    public function DeletePost(){

        $id = $this->input->get('postid');
        $cb = $this->Post_m->deletePost($id);

        echo $cb;

    }

    public function DraftPost(){

        $id = $this->input->get('postid');
        $cb = $this->Post_m->draftPost($id);

        echo $cb;

    }

    public function readPost($id = NULL,$msg= NULL){

        if (is_null($id) && is_null($msg)) {
            $postid = $this->uri->segment(3);
            $data['read'] = $this->Post_m->getPostdata($postid);
            $this->load->view('templates/header');
            $this->load->view('read', $data);

        }else {
            $data['msg'] = $msg;
            $data['read'] = $this->Post_m->getPostdata($id);
            $this->load->view('templates/header');
            $this->load->view('read', $data);
        }
    }



}