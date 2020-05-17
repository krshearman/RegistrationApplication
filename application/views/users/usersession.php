<div class="container usersession">
    <main>


        <div class="container">

            <div class="row">
                <h3 class="userheading text-center">Member Area</h3>
            </div>
            <div class="row usercard">
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">Quotes</h5>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">Member Info</h5>
                        <div class="card-body">
                            <h5 class="card-title">Welcome <?php echo $_SESSION['username'] ?>!</h5>
                            <p class="card-text"></p><br>
                            <div class="userbutton text-center">
                                <form action="/logout" method="post">
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 my-button userbutton">LOG OUT</button>
                                    <!-- <p><?php /*echo $_SESSION['username'] */?></p>-->
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>