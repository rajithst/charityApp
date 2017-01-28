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


    public function publishPost(){

        $id = $this->input->get('postid');
        $cb = $this->Post_m->addtoPublish($id);

        echo $cb;

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


}