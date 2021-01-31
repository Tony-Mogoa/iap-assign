<?php
return "
<div class='title'><h1>Reset Password</h1></div>
<div class='center'>
  <form method='post' action='index.php?page=passwordreset'>
    <div class='table'>
      <div class='tbl-row'>
        <div class='tbl-cell'></div>
        <span class='tbl-cell error'>$error_while_changing</span>
      </div>
      <div class='tbl-row'>
        <label class='tbl-cell'>Current password</label>
        <input
          class='tbl-cell textbox'
          type='password'
          size='70'
          name='old-password'
          autocomplete='off'
          required
        />
        <br/>
        <span class='error'>$error_old</span>
      </div>
      <br />
      <div class='tbl-row'>
        <label class='tbl-cell'>New password</label>
        <input
          class='tbl-cell textbox'
          type='password'
          size='70'
          name='new-password'
          autocomplete='off'
          required
        />
        <br/>
        <span class='error'>$error_new</span>
      </div>
      <br />
      <div class='tbl-row'>
        <label class='tbl-cell'>Re-enter password</label>
        <input
          class='tbl-cell textbox'
          type='password'
          size='70'
          name='confirm-password'
          autocomplete='off'
          required
        />
        <br/>
        <span class='error'>$error_confirm_new</span>
      </div>
      <br />
    </div>
    <input
      class='submit-btn btn-primary'
      type='submit'
      value='Change password'
      name='change-password'
    />
  </form>
</div>
";
?>