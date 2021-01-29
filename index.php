<?php
require_once("./model/Page.php");

$page = new Page("Home");

$page->set_body("<h1>First Render</h1>");
$page->render();
?>