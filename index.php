<?php
require_once("./model/Page.class.php");
require_once("./util/Database.class.php");

$page = new Page("Login");

$page->set_header(require_once("./views/nav.php"));
$page->set_body(require_once("./views/register.php"));
$page->render();

?>