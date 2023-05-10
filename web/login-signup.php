<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAC - Login/Signup</title>
</head>
<body>
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

<br />
<br />

<h3>Enter the information below to log-in to your account.</h3>
<form class="form-horizontal" action="javascript:void(0);">
    <div class="col-xs-12" style="height:20px;"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="loginemail" name="email" placeholder="Email" autofocus />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="loginpassword" name="password" placeholder="Password" />
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <input type="submit" id="loginButton" class="btn btn-primary btn-block" value="Log In" onclick="login()" />
    </div>
    <div class="col-xs-12" style="height:10px;"></div>
    <div class="container col-md-9 col-md-offset-5">
        <a class="btn btn-link" href="privacy-policy.pdf" role="button">Privacy Policy</a>
    </div>
</form>

<script>

function login() {
    if ($('#loginemail').val() == '') {
        alert('Email Required! - Enter your email address and try again!');
    } else if ($('#loginpassword').val() == '') {
        alert('Password Required! - Enter your password and try again!');
    } else {
        var settings = {
            'async': true,
            'url': 'userlogin.php?email=' + $('#loginemail').val() + '&password=' + $('#loginpassword').val(),
            'method': 'POST',
            'headers': {
                'Cache-Control': 'no-cache'
            }
        };

        $('#loginButton').prop('disabled', true);

        $.ajax(settings).done(function(response) {
            window.location.replace('index.php?content=home');
        }).fail(function() {
            alert('Check your email address and password and try again.');
        }).always(function() {
            $('#loginButton').prop('disabled', false);
        });
    }
}


function register() {
    if ($('#displayName').val() == '') {
        alert('Display Name Required! - Your display name can\'t be blank. Enter a value and try again.');
    } else if ($('#user_password').val() == '') {
        alert('Password Required! - Enter your password and try again!');
    } else if ($('#email').val() == '') {
        alert('Email Required! - Enter your email address and try again!');
    } else if ($('#user_password').val() != $('#confirmPassword').val()) {
        alert('Password Mismatch! - Your passwords don\'t match, try again.');
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
                alert('Email Taken! - This email address has been used already. Do you need to reset the password?</a>?');
            } else {
                alert('Oops, Error! - Something went wrong, try again later.');
            }
        }).always(function() {
            $('#registerButton').prop('disabled', false);
        });
    }
}
</script>
</body>
</html>