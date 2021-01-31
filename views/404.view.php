<?php
require_once("./util/BreakCreator.class.php");
$breaks = BreakCreator::insert(7);
return "
$breaks
<div class='center'>
    <div class='card danger'>
        <div class='center'>
            <h1 class='bold text-danger'>404 !</h1>
        </div>
        <div class='center red'>
            <p class='bold text-danger'>We didn't find that page.<br/>Instead:</p>
        </div>
        <br/>
        <div class='center'>
            <a href='index.php?page=login' class='button btn-primary'>Log in</a>
        </div>
    </div>
</div>";
?>