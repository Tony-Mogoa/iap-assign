<?php
class Page{
    private $title;
    private $style;
    private $js;
    private $header;
    private $body;
    private $footer;

    public function __construct($title){
        //sadly php does not let you use getters and setters in the constructor
        $this->title = $title;
        $this->style = "";
        $this->js = "";
        $this->header = "";
        $this->body = "";
        $this->footer = "";
    }

    public function render(){
        //all paths should be relative to index.php
        echo require_once("./views/page.php");
    }

    public function set_title($title){
        $this->title = $title;
    }

    public function get_title(){
        return $this->title;
    }
    
    public function set_style($style){
        $this->style = $style;
    }

    public function get_style(){
        return $this->style;
    }

    public function set_js($js){
        $this->js = $js;
    }

    public function get_js(){
        return $this->js;
    }

    public function set_header($header){
        $this->header = $header;
    }

    public function get_header(){
        return $this->header;
    }

    public function set_body($body){
        $this->body = $body;
    }

    public function get_body(){
        return $this->body;
    }

    public function set_footer($footer){
        $this->footer = $footer;
    }

    public function get_footer(){
        return $this->footer;
    }

}
?>