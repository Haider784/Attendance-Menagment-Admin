<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
<!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style>
    body,
    html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f5f5f5;
        /* Optional: background color */
    }

    .error {
        color: red;
    }

    /* Centering the form */
    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container-center {
        width: 100%;
        max-width: 400px;
    }

    .panel {
        margin: 0 auto;
    }
</style>
<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('error')) : ?>
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 1000
            };
            toastr.error('<?php echo $this->session->flashdata('error'); ?>');
        <?php endif; ?>
    });
</script>


<body>
    <div class="login-wrapper">
        <div class="container-center">




            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Login</h3>
                            <small><strong>Please enter your credentials to login.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="<?php echo site_url('loginController/login'); ?>" id="loginForm" method="post" novalidate>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" placeholder="Enter your email" title="Please enter your email" required="" value="<?php echo set_value('email'); ?>" name="email" id="email" class="form-control">
                            <span class="help-block small">Your unique email to app</span>
                            <div class="error"><?php echo form_error('email'); ?></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="<?php echo set_value('password'); ?>" name="password" id="password" class="form-control">
                            <span class="help-block small">Your strong password</span>
                            <div class="error"><?php echo form_error('password'); ?></div>
                        </div>
                        <?= get_recaptcha(); ?>
                        <br>
                        <div>
                            <button class="btn btn-primary" type="submit">Login</button>
                            <a class="btn btn-warning" href="<?= base_url('register') ?>">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>