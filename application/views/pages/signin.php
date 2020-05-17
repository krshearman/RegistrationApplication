

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <div id="signin-msg">
                                    <!-- This is a blank area for us to talk to the user -->
                                    <br>
                                </div>


                                <h3 class="login-heading mb-4">Sign in here!</h3>
                                <form id="sign-in" action="" method="">
                                    <div class="form-label-group">
                                        <input type="text" id="user" name="user" class="form-control" placeholder="Username">
                                        <label for="user">Username</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
                                        <label for="pass">Password</label>
                                    </div>


                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 my-button" type="button" id="signin-submit">Sign in</button>
                                    <div class="text-center signinlinks">
                                        <a class="small" href="<?php echo base_url(); ?>forgotpass">Forgot password?</a>
                                    </div>
                                    <div class="text-center signinlinks">
                                        <a class="small" href="<?php echo base_url(); ?>register">New User? Register Now!</a>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
