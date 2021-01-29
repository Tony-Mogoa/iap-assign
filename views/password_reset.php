<?php
return "
<div class='title'><h1>Reset Password</h1></div>
<div class='center'>
  <form method='post'>
    <div class='table'>
      <div class='tbl-row'>
        <label class='tbl-cell'>Current password</label>
        <input
          class='tbl-cell textbox'
          type='password'
          size='70'
          name='password'
        />
      </div>
      <br />
      <div class='tbl-row'>
        <label class='tbl-cell'>New password</label>
        <input
          class='tbl-cell textbox'
          type='password'
          size='70'
          name='password'
        />
      </div>
      <br />
      <div class='tbl-row'>
        <label class='tbl-cell'>Re-enter password</label>
        <input
          class='tbl-cell textbox'
          type='password'
          size='70'
          name='password'
        />
      </div>
      <br />
    </div>
    <input
      class='submit-btn btn-primary'
      type='submit'
      value='Change password'
    />
  </form>
</div>
";
?>