<?php
class FileUpload_c extends MY_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Upload_m');
    }
    //upload picture
    public function uploadPicture($dbtable,$fileobjname,$userid,$path){
        $id = $fileobjname;
        $targtid = $userid;
        if($_FILES[$id]["name"]==""){
                return;
            }
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES[$id]["name"]);
            $file_extension = end($temporary);
            if ($_FILES[$id]["error"] > 0)
            {
                $alert = "Return Code: " . $_FILES[$id]["error"] . "<br/><br/>";
                echo $alert;
                return;
            }
            else
            {
                $name = $targtid."pic.".$file_extension;
                $sourcePath = $_FILES[$id]['tmp_name']; // Storing source path of the file in a variable
                $targetPath="dfgd";
                if(strcmp($dbtable,"posts")==0){
                    $targetPath = str_replace("1br1", "/", $path)."/".$_FILES['file']['name'];
                }else{
                     $targetPath = str_replace("1br1", "/", $path)."/$name"; // Target path where file is to be stored
                }
                move_uploaded_file($sourcePath,$targetPath);
                //set path in the database
                if($this->Upload_m->setPicturePath($userid,$dbtable,$targetPath)){
                    echo "uploaded";
                }else{
                    echo "uploading error occured";
                }
                return;
            }
    }
    function slimasync($name,$path,$dbtable){

        // Uncomment if you want to allow posts from other domains
        // header('Access-Control-Allow-Origin: *');

        require_once('slim.php');
        
        // get posted data, if something is wrong, exit
        try {
            $images = Slim::getImages();
        }
        catch (Exception $e) {
            Slim::outputJSON(SlimStatus::Failure);
            return;
        }
        
        // if no images found
        if (count($images)===0) {
            Slim::outputJSON(SlimStatus::Failure);
            return;
        }

        // should always be one file (when posting async)
        $image = $images[0];
        $targetpath = str_replace("1br1", "/", $path);
        $extention = end(explode('.', $image['input']['name']));
        $targetname = "";
        if(strcmp($dbtable,"posts")==0){
            $targetname = uniqid().".".$extention;
        }else{
            $targetname = $name.".".$extention;
        }
        $file = Slim::saveFile($image['output']['data'], $targetname, $targetpath);
        $this->Upload_m->setPicturePath($name,$dbtable,$targetpath.$targetname);
        if($this->session->userdata(id)==$name){
            $this->session->set_userdata('picture',$targetpath.$targetname);
        }
        // echo results
        Slim::outputJSON(SlimStatus::Success, $file['name'], $file['path']);
    }
}