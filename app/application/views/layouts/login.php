<?php
    $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
    );
?>

<body id="LoginForm">
    <div class="container">
        <div class="notifications"></div>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <h2>Admin Login</h2>
                    <p>Please enter your email and password</p>
                </div>

                <form id="Login" method="post" action="<?php echo base_url('login/auth');?>">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" id="inputUsername" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                    <div class="forgot">
                        <a href="reset.html">Forgot password?</a>
                    </div>
                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <p class="botto-text"> Designed by Sunil Rajput</p>
        </div>
    </div>
</body>

<script>
    $(document).ready(() => {
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>',
            Elnotif;
        $('#Login').submit((e) => {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('index.php/login/auth');?>",
                data: {
                    'username': $('#inputUsername').val(),
                    'password': $('#inputPassword').val(),
                    'csrf_token_ciblog': csrfHash
                },
                dataType: "json",
                success: (returnData) => {
                    console.log(returnData);
                    csrfHash = returnData.csrfHash;
                    Elnotif = $('.notifications');

                    if( returnData.msg ){
                        Elnotif.show();
                        Elnotif.html(returnData.msg);
                    } else {
                        Elnotif.hide();
                        window.location = '<?php echo base_url();?>admin/dashboard';
                    }
                    setInterval(() => Elnotif.hide(), 5000);
                }
            })
        });
    });
</script>