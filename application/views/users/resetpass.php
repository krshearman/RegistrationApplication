

    <div class="container-fluid">

        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">

                                <div id="resetpass-msg" class="">
                                    <!-- This is a blank area for us to talk to the user -->
                                    <br>
                                </div>
                                <h3 class="login-heading mb-4">Reset your password</h3>
                                <form id="resetpass-form" method="" action="">
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
                                </form>
                                <button id="resetpass-submit" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 my-button" type="submit">Reset Your Password</button>
                                <div class="checks">
                                    <a class="small" id="resetpass-clear" href="#">Clear Form</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
