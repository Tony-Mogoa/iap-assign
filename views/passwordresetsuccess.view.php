<?php
require_once("./util/BreakCreator.class.php");
session_destroy();
$breaks = BreakCreator::insert(7);
return "
$breaks
<div class='center'>
    <div class='card primary text-primary'>
        <div class='center'>
            <h1 class='lighter'>We changed your password successfully. Please login with your new password.</h1>
        </div>
        <br/>
        <div class='center'>
            <a href='index.php?page=login' class='button btn-primary'>Log in</a>
        </div>
    </div>
</div>";

?>