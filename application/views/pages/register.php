<!------------------------------------------------------------
Name: Kendall Shearman
Assignment: Final Project
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------->

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
                                    <?php /*if($this->session->flashdata('user_registered')): */?><!--
                                        <?php /*echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; */?>
                                    <?php /*endif; */?>
                                    <?php /*if($this->session->flashdata('user_loggedin')): */?>
                                        <?php /*echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; */?>
                                    <?php /*endif; */?>
                                    <?php /*if($this->session->flashdata('login_failed')): */?>
                                        <?php /*echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; */?>
                                    --><?php /*endif; */?>
                                </div>
                                <div id="reg-msg" class="reg-msg-style">
                                    <!-- This is a blank area for us to talk to the user -->
                                    <br>
                                </div>
                                <h3 class="login-heading mb-4">Register</h3>
                                <?php /*echo validation_errors(); */?><!--

                                --><?php /*echo form_open('users/register'); */?>


                                <form id="register-form" method="" action="">
                                    <div class="form-label-group">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="UserName">
                                        <label for="username">UserName</label>
                                       <div class="checks">
                                            <p class="small" id="uniqueuser">Must not be blank | Must be unique</p>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email address">
                                        <label for="email">Email</label>
                                        <div class="checks">
                                            <p class="small" id="uniqueemail">Must not be blank | Must be valid</p>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="text" id="emailconf" name="emailconf"  class="form-control" placeholder="Confirm Email address">
                                        <label for="emailconf">Confirm Email</label>
                                        <div class="checks">
                                            <p class="small">Must match</p>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                        <label for="password">Password</label>
                                        <div class="checks">
                                            <p class="small">At least 8 characters | 1 upper | 1 lower | 1 symbol | 1 number</p>
                                        </div>
                                        <br>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="passwordconf" name="passwordconf" class="form-control" placeholder="Confirm Password">
                                        <label for="passwordconf">Confirm</label>
                                        <div class="checks">
                                            <p class="small">Must match</p>
                                        </div>

                                    </div>
                                    <br>


                                    <br>

                                <?php /*echo form_close(); */?>
                                </form>
                                <button id="reg-submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 my-button" type="submit">Register Now</button>

                                <div class="checks">
                                    <a class="small" id="reg-clear" href="#">Clear Form</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
