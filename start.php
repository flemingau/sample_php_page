<?php

namespace Start;

require_once( "form_input.php" );
require_once( "page.php" );

use Form_Input\form_input;
use Page\page;

class start
{
    public function run()
    {
        
        $page = new page();

        $title = 'PHP Code Challenge';
        $page->set_title( $title );

        /*
         * Create additional header elements for this page
         */
        $page->set_header_element('<meta charset="utf-8">');
        $page->set_header_element('<meta name="description" content="Code challenge provided by Luke for Learnerator interview" />');
        $page->set_header_element('<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400" rel="stylesheet" type="text/css">');

        /*
         * Create the form input fields
         */
        $firstName = new form_input( 'firstName', 'First Name:', 'text' ); 
        $lastName = new form_input( 'lastName', 'Last Name:', 'text' );

        /*
         * Add each new form input into the page in the order you would like them to appear
         */
        $page->get_container() -> add( $firstName );
        $page->get_container() -> add( $lastName );
        $page->render();

    }
}

// This runs the above function to render the page
$start = new start();
$start->run();

?>