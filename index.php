<?php
require_once("./models/Page.class.php");
session_start();

$page = new Page("Login");

if(isset($_GET['page'])){
    if($_GET['page'] != 'login' && $_GET['page'] != 'register' && !isset($_SESSION['logged-in'])){
        $page->set_header(require_once("./views/404.view.php"));
    }else{
        $pathToFile = "./controllers/" . $_GET['page'] . ".controller.php";
        $page->set_body(require_once($pathToFile));
    }
}

else if(isset($_SESSION['logged-in'])){
    $page->set_title("Home");
    $page->set_header(require_once("./controllers/nav.controller.php"));
    $page->set_body(require_once("./controllers/home.controller.php"));
}

else{
    $page->set_body(require_once("./controllers/login.controller.php"));
}

$page->render();
?>