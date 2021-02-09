<?php
return "
<div class='title-reg'><h1>Create account</h1></div>
<div class='center'>
    <form method='post' enctype='multipart/form-data' action='./controllers/registerajax.controller.php' onsubmit='sendRegisterForm(this); return false;'>
        <div class='table'>
            <div class='tbl-row'>
                <div class='tbl-cell'></div>
                <span class='tbl-cell error' id='register-error'></span>
            </div>
            <br/>
            <div class='tbl-row'>
                <label class='tbl-cell'>Full name</label>
                <input
                    class='tbl-cell textbox'
                    type='text'
                    size='70'
                    name='full-name'
                    value='Tony Mogoa'
                    required
                />
                <br/>
                <span class='error' id='full-name'>$name_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Email</label>
                <input
                    class='tbl-cell textbox'
                    type='email'
                    size='70'
                    name='email'
                    value='mogoa.tonny@gmail.com'
                    required
                />
                <br/>
                <span class='error' id='email'>$email_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Password</label>
                <input
                    class='tbl-cell textbox'
                    type='password'
                    size='70'
                    name='password'
                    value='1234'
                    required
                />
                <br/>
                <span class='error' id='password'>$password_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Confirm password</label>
                <input
                    class='tbl-cell textbox'
                    type='password'
                    size='70'
                    name='confirm-password'
                    value='1234'
                    required
                />
                <br/>
                <span class='error' id='confirm-password'>$confirm_password_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>City of Residence</label>
                <input
                    class='tbl-cell textbox'
                    type='text'
                    size='70'
                    name='city'
                    value='Nairobi'
                    required
                />
                <br/>
                <span class='error' id='city'>$city_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Attach profile photo</label>
                <input class='tbl-cell' type='file' size='70' accept='.png,.jpg,.gif' name='profile-pic' id='profile-pic-url' required/>
                <br/>
                <span class='error' id='profile-pic'>$file_upload_error</span>
            </div>
            <br />
        </div>
        <input class='submit-btn btn-primary' type='submit' value='Register' name='register' />
    </form>
</div>
<p class='or'>or</p>
<div class='center'>
  <a href='index.php?page=login' class='button btn-primary'>Login</a>
</div>
";
?>