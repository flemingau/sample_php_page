<?php

namespace Page;

require_once( "form_container.php" );

use Form_Container\form_container;

class page
{
    protected $container = null;
    protected $title = null;
    protected $header_elements_array = array();

    public function __construct() {
        $this->container = new form_container();
        return;
    }

    /*
     * Get and set functions for title of page
     */
    public function get_title() { return $this->title; }
    public function set_title( $title ) { $this->title = $title; return; }


    /*
     * Get and set functions for head elements
     * Originally thought of creating get and set functions to format different tags like
     * META, SCRIPT, ETC... but figured this would be more flexible
     */
    protected function get_header_elements() {
      foreach( $this->header_elements_array as $header_element ) {
        $header_elements .= "\n" . $header_element;
      }

      return $header_elements;
    }
    public function set_header_element( $element ) {
      $this->header_elements_array[] = $element;
    }


    /*
     * Displays the HEAD tag and its attributes
     */
    public function show_head() {
        
      $output = '<head>';
      
      if( empty( $this->title ) ) {
        $this->title = "No Title Available";
      } 

      $output .= '<title>' . $this->title . '</title>';
      $output .= $this->get_header_elements();
      $output .= "\n</head>";

      echo $output;
    }

    /*
     * Makes the protected container variable available to start class for run function
     */
    public function get_container() { return $this->container; }


    /*
     * Builds the main content by looping through the input_arrays and rendering each one
     */
    public function show_contents() {
        $inputs_array = $this->container->get_inputs_array();
        
        foreach( $inputs_array as $input_name => $input_value ) {
          $contents .= $inputs_array[ $input_name ]->render();
        }

        return $contents;
    }

    /* 
     * Renders the entire page
     */
    public function render() {
        echo "<!DOCTYPE html>\n";
        echo "<html>\n";
        $this->show_head();
        
        echo"\n<body>\n";
        echo $this->show_contents();

        echo "\n</body>";
        echo "\n</html>\n\n";
    }
}

?>