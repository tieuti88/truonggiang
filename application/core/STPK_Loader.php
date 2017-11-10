<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class STPK_Loader extends CI_Loader {

    /**
     * @author UnoTrung
     * 2017-21-07
     */

    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('layout/header_customer', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('layout/footer_customer', $vars, $return);

            return $content;
        else:
            $this->view('layout/header_customer', $vars);
            $this->view($template_name, $vars);
            $this->view('layout/footer_customer', $vars);
        endif;
    }


}