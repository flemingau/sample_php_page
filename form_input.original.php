<?
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
 
 
abstract class output {
    public function render ();
}
  
class form_input extends output {
    function __construct($field = null, $label = null) {
        $this->field = $field;
        $this->label = $label;
    }
    function render() {
        return '<p>' . $this->show_label() . $this->show_input() '</p>\n";
    }
    function show_label() {
        return '<span class="label">' . htmlentities($this->label, ENT_COMPAT, 'utf8') . '</span>';
    }
    function show_input() {
        return '<input type="' . $this->type 
          . '" name="' . $this->field ."\">';
    }
}