<?php

namespace Form_Container;

require_once( "form_input.php" );

use Form_Input\form_input;

class form_container
{
    protected $inputs_array = array();

    public function __construct() { 
    }

    /*
     * Adds input field to the inputs_array using field name as key
     */
    public function add( form_input $input ) {
        $this->inputs_array[ $input->get_field() ] = $input;
        return;
    }

    /*
     * Makes the protected inputs_array variable available to page class for show_contents function
     */
    public function get_inputs_array() {
        return $this->inputs_array;
    }

}

?>