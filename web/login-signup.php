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
        <label class="col-sm-3 control-label" for="password">Password:</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
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
        } else if ($('#password').val() == '') {
            showAlert('danger', 'Password Required!', 'Enter your password and try again!');
        } else if ($('#password').val() != $('#confirmPassword').val()) {
            showAlert('danger', 'Password Mismatch!', 'Your passwords don\'t match, try again.');
        } else {
            var settings = {
                'async': true,
                'url': 'createAccount.php?password=' + $('#password').val() + '&name=' + $('#name').val(),
                'method': 'POST',
                'headers': {
                    'Cache-Control': 'no-cache'
                }
            };

            $('#registerButton').prop('disabled', true);
        }
    }
</script>