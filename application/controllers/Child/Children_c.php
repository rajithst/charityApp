<?php
class Children_c extends MY_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('Children_m');
    }
    //view child profile
    public function viewChild($id){
        $childData = $this->Children_m->getChildData($id);
        $data['child'] = $childData[0];
        $this->load->template('Child/childprofileView',$data);
    }

    public function getAllChildren(){
        $data=$this->Children_m->getAllChildren();
         // header('Content-type: text/plain'); 
         //  header('Content-type: application/json'); 
          echo json_encode($data);

    }
}
