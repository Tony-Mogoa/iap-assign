<?php
$progress_bar = require_once("./views/progressbar.view.php");
return "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap' rel='stylesheet'> 
    <link rel='stylesheet' href='./assets/css/main.css'>
    <script src='./assets/js/main.js'></script>
    <title>$this->title</title>
    $this->style 
    $this->js
  </head>
  <body>
    $progress_bar
    $this->header 
    $this->body 
    $this->footer
  </body>
</html>
"; ?>
