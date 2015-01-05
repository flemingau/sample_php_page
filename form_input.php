<?php
/*
  Write the two subclasses listed below - it's up to you to decide what to subclass:
  1. form_container, which will output a group of form elements.
    Add an "add" method to add to the group of form elements for output.
  2. page, which will render form elements within proper <html><head></head><body> etc. tagging.
    Add any necessary methods to optionally add typical "head" includes and set the title.
    Add any optional methods you think would be useful.
     
  Then write code to add first, last name fields and display them in a page.  The code is 
  not perfect, please fix any errors you find.
*/
 
namespace Form_Input;
 
abstract class output {
    abstract public function render();
    // FIX: added "abstract" to function because it's within an abstract class
    // FIX: removed space between render and parentheses
}
  
class form_input extends output {

    protected $field = null;
    protected $label = null;
    protected $type = null;

    // FIX: added $type variable to identify input type
    function __construct($field = null, $label = null, $type = null) {
        $this->field = $field;
        $this->label = $label;
        $this->type = $type;

        return ( $this->field && $this->label && $this->type );
    }

    /*
     * Makes the protected field variable available to form_container class for add function
     */
    public function get_field() { return $this->field; }

    /*
     * Renders the combined input fields
     */
    function render() {
        return '<p>' . $this->show_label() . $this->show_input() . "</p>\n";
        // FIX: added missing concatenation operator (.)
        // FIX: replaced single quote with double quote at the end of return value so the return won't display
    }

    /*
     * Creates the html code for a label
     */
    function show_label() {
        return '<label class="label" for="' . $this->field . '">' . htmlentities($this->label, ENT_COMPAT, 'utf-8') . '</label>';
        // FIX: updated utf8 to utf-8
        // FIX: changed the tag from span to label for proper tagging and improved SEO
    }

    /*
     * Creates the html code for an input
     */
    function show_input() {
        return '<input type="' . $this->type . '" name="' . $this->field . "\" />";
        // FIX: added a space and forward slash at the end of input tag
    }
}
// FIX: added closing php tag below

?>