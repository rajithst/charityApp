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
}