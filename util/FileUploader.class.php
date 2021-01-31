<?php
class FileUploader{
    private $file_destination;
    private $file_key;
    private $file_name;

    public function __construct($file_key, $file_destination){
        $this->file_destination = $file_destination;
        $this->file_key  = $file_key;
        $this->file_name = $_FILES[$this->file_key]['name'];
    }

    public function upload(){
        if(is_writable($this->file_destination)){
            $absolute_file_path = $this->file_destination . "/" . $this->file_name;
            return move_uploaded_file($_FILES[$this->file_key]['tmp_name'], $absolute_file_path);
        }else{
            return false;
        }
    }

    public function get_file_name(){
        return $this->file_name;
    }
}
?>