<?php
require_once("./model/Page.class.php");
session_start();

$page = new Page("Login");

if(isset($_SESSION['loggedIn'])){
    $page->set_title("Home");
    $page->set_header(require_once("./controllers/nav.controller.php"));
    $page->set_body(require_once("./controllers/Home.controller.php"));
}

else if(isset($_GET['page'])){
    $pathToFile = "./controllers/" . $_GET['page'] . ".controller.php";
    $page->set_body(require_once($pathToFile));
}

else{
    $page->set_body(require_once("./controllers/login.controller.php"));
}

$page->render();
?>