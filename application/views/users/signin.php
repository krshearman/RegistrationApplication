

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <?php echo validation_errors(); ?>

                                <?php echo form_open('users/signin'); ?>
                                <h3 class="login-heading mb-4">Sign in here!</h3>
                                <form>
                                    <div class="form-label-group">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus>
                                        <label for="username">Username</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 my-button" type="submit">Sign in</button>
                                    <div class="text-center signinlinks">
                                        <a class="small" href="<?php echo base_url(); ?>users/forgotpass">Forgot password?</a>
                                    </div>
                                    <div class="text-center signinlinks">
                                        <a class="small" href="<?php echo base_url(); ?>users/register">New User? Register Now!</a>
                                    </div>
                                    <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
