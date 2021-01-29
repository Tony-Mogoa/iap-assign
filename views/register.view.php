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
                />
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Email</label>
                <input
                    class='tbl-cell textbox'
                    type='email'
                    size='70'
                    name='email'
                />
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Password</label>
                <input
                    class='tbl-cell textbox'
                    type='password'
                    size='70'
                    name='password'
                />
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Confirm password</label>
                <input
                    class='tbl-cell textbox'
                    type='password'
                    size='70'
                    name='confirm-password'
                />
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>City of Residence</label>
                <input
                    class='tbl-cell textbox'
                    type='text'
                    size='70'
                    name='city'
                />
            </div>
            <br />
            <div class='tbl-row'>
                <label class='tbl-cell'>Attach profile photo</label>
                <input class='tbl-cell' type='file' size='70' />
            </div>
            <br />
        </div>
        <input class='btn-primary submit-btn' type='submit' value='Register' />
    </form>
</div>
";
?>