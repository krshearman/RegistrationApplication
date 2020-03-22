

    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <div>
                                    <!-- Flash messages -->
                                    <?php if($this->session->flashdata('user_registered')): ?>
                                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
                                    <?php endif; ?>
                                </div>
                                <h3 class="login-heading mb-4">Register</h3>
                                <?php echo validation_errors(); ?>

                                <?php echo form_open('users/register'); ?>
                                    <div class="form-label-group">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="User Name" autofocus>
                                        <label for="username">User Name</label>
                                       <!-- <div class="checks">
                                            <a class="small" href="#">Check Availability</a>
                                        </div>-->
                                        <br>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email address" autofocus>
                                        <label for="email">Email address</label>
                                        <!--<div class="checks">
                                            <a class="small" href="#">Check Existence</a>
                                        </div>-->
                                        <br>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="text" id="emailconf" name="emailconf"  class="form-control" placeholder="Confirm Email address" autofocus>
                                        <label for="emailconf">Confirm Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                        <label for="password">Password</label>
                                        <div class="checks">
                                            <a class="small" href="#">At least 8 characters</a>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="passwordconf" name="passwordconf" class="form-control" placeholder="Confirm Password">
                                        <label for="passwordconf">Confirm Password</label>
                                    </div>
                                    <br>

                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 my-button" type="submit">Register Now</button>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
