<?php
return "
<div class='main'>
  <div class='profile-display'>
    <img src='$url' class='profile-pic' />
    <p class='username'>" . $_SESSION['full-name'] . "</p>
  </div>
</div>
";
?>
