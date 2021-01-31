<?php
abstract class BreakCreator{

    public function insert($num_breaks)
    {
        $breaks_text = "";
        for ($i=0; $i < $num_breaks; $i++) { 
            $breaks_text .= "<br/>";
        }
        return $breaks_text;
    }
}
?>