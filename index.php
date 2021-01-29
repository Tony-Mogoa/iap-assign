<?php
require_once("./model/Page.php");

$page = new Page("Login");

$page->set_header(require_once("./views/nav.php"));
$page->set_body(require_once("./views/password_reset.php"));
$page->render();
?>