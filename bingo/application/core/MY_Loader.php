<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Phuoc Vo Van 

http://facebook.com/gietmxh
*/


class MY_Loader extends CI_Loader {

    public function __construct() {
        parent::__construct();
    }

    public function template($template_name, $vars = array(), $return = FALSE) {


        if($return) {
            $content  = $this->view('Header', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('Footer', $vars, $return);

            return $content;
        } else { 
            $this->view('Header', $vars);
            $this->view($template_name, $vars);
            $this->view('Footer', $vars);
        }
    }

    public function chen($template_name, $vars = array(), $return = FALSE) {


        if($return) {
            $content = $this->view($template_name, $vars, $return);


            return $content;
        } else {
            $this->view($template_name, $vars);

        }
    }


}
?>