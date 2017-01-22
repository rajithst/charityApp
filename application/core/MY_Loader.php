<?php

//automatically load header and footer


class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('templates/header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
<<<<<<< HEAD
//            $content .= $this->view('templates/footer', $vars, $return);
=======
           
>>>>>>> 0a1192d90615629523b6e1c30f8a66e4ae1dde51

            return $content;
        else:
            $this->view('templates/header', $vars);
            $this->view($template_name, $vars);
<<<<<<< HEAD
//            $this->view('templates/footer', $vars);
        endif;
    }
=======
           
        endif;
    }


    public function customizeTemplate($header= NULL ,$footer = NULL,$template_name, $vars = array(), $return = FALSE){


        if($return) {
            $content = "";
            if ($header != NULL) {
                $content .= $this->view('templates/' . $header, $vars, $return);
            }
                $content .= $this->view($template_name, $vars, $return);

            if ($footer != NULL) {
                $content .= $this->view('templates/' . $footer, $vars, $return);
            }

            return $content;

        } else{

            $this->view('templates/header', $vars);
            $this->view($template_name, $vars);
            $this->view('templates/footer', $vars);

        }



    }
>>>>>>> 0a1192d90615629523b6e1c30f8a66e4ae1dde51
}