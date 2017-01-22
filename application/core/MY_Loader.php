<?php

//automatically load header and footer


class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('templates/header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('templates/footer', $vars, $return);

            return $content;
        else:
            $this->view('templates/header', $vars);
            $this->view($template_name, $vars);
            $this->view('templates/footer', $vars);
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
}