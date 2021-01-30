<?php
return "
<div class='title'><h1>Create account</h1></div>
<div class='center'>
    <form method='post'>
        <div class='table'>
            <div class='tbl-row'>
                <label class='tbl-cell'>Full name</label>
                <input
                    class='tbl-cell textbox'
                    type='text'
                    size='70'
                    name='full-name'
                    required
                />
                <span class='error'>$name_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Email</label>
                <input
                    class='tbl-cell textbox'
                    type='email'
                    size='70'
                    name='email'
                    required
                />
                <span class='error'>$email_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Password</label>
                <input
                    class='tbl-cell textbox'
                    type='password'
                    size='70'
                    name='password'
                    required
                />
                <span class='error'>$password_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Confirm password</label>
                <input
                    class='tbl-cell textbox'
                    type='password'
                    size='70'
                    name='confirm-password'
                    required
                />
                <span class='error'>$confirm_password_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>City of Residence</label>
                <input
                    class='tbl-cell textbox'
                    type='text'
                    size='70'
                    name='city'
                    required
                />
                <span class='error'>$city_error</span>
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Attach profile photo</label>
                <input class='tbl-cell' type='file' size='70' accept='.png,.jpg,.gif' required/>
            </div>
            <br />
        </div>
        <input class='btn-primary submit-btn' type='submit' value='Register' name='register' />
    </form>
</div>
";
?>