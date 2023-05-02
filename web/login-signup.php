<h3>Enter the information below to create your account.</h3>
<form class="form-horizontal" action="javascript:void(0);">
    <div class="col-xs-12" style="height:20px;"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="displayName">Display Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="displayName" name="displayName" placeholder="Display Name" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="user_password">Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" from="confirmPassword">Confirm Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <input type="button" id="registerButton" class="btn btn-primary btn-block" value="Create Account" onclick="register()" />
    </div>
    
</form>
</div>

<script>

    function register() {
        if ($('#displayName').val() == '') {
            showAlert('danger', 'Display Name Required!', 'Your display name can\'t be blank. Enter a value and try again.');
        } else if ($('#user_password').val() == '') {
            showAlert('danger', 'Password Required!', 'Enter your password and try again!');
        } else if ($('#email').val() == '') {
            showAlert('danger', 'Email Required!', 'Enter your email address and try again!');
        } else if ($('#user_password').val() != $('#confirmPassword').val()) {
            showAlert('danger', 'Password Mismatch!', 'Your passwords don\'t match, try again.');
        } else {
            var settings = {
                'async': true,
                'url': 'userSave.php?user_password=' + $('#user_password').val() + '&name=' + $('#displayName').val() + '&email=' + $('#email').val(),
                'method': 'POST',
                'headers': {
                    'Cache-Control': 'no-cache'
                }
            };

            $('#registerButton').prop('disabled', true);
            $.ajax(settings).done(function(response) {
                showAlert('success', 'Account Registered!', 'We\'ve sent you an email to verify your address. Continue to the <a href="index.php?content=home">homepage</a> to get started.');
                setTimeout(function() { window.location.replace('index.php?content=home'); }, 5000);
            }).fail(function(jqXHR) {
                if (jqXHR.status == 400) {
                    showAlert('danger', 'Email Taken!', 'This email address has been used already. Do you need to reset the password?</a>?');
                } else {
                    showAlert('danger', 'Oops, Error!', 'Something went wrong, try again later.');
                }
            }).always(function() {
                $('#registerButton').prop('disabled', false);
            });
    }
}

</script>