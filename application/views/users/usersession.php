<!------------------------------------------------------------
Name: Kendall Shearman
Assignment: Final Project
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------->

<div class="container usersession">
    <main>
        <div class="container">
            <div class="row">
                <h3 class="userheading text-center">Member Area</h3>
            </div>
                <div class="col">
                    <div class="card usercard">
                        <h5 class="card-header">Member Info</h5>
                        <div class="card-body">
                            <h5 class="card-title">Welcome <?php echo $_SESSION['username'] ?>!</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec cursus ipsum, vel aliquet sapien. Sed id eleifend massa, ac sodales lorem. Nullam luctus sapien sed dolor eleifend fermentum. Nunc feugiat nibh ac tincidunt elementum. Cras in nunc eu dolor vehicula euismod. Donec id felis eget dui consectetur tincidunt a vestibulum purus. Nam sit amet quam ultrices, malesuada ligula vitae, viverra est. Aenean vestibulum blandit dignissim. Suspendisse iaculis pharetra luctus. Nunc quis lacus urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec cursus ipsum, vel aliquet sapien. Sed id eleifend massa, ac sodales lorem. Nullam luctus sapien sed dolor eleifend fermentum. Nunc feugiat nibh ac tincidunt elementum. Cras in nunc eu dolor vehicula euismod. Donec id felis eget dui consectetur tincidunt a vestibulum purus. Nam sit amet quam ultrices, malesuada ligula vitae, viverra est. Aenean vestibulum blandit dignissim. Suspendisse iaculis pharetra luctus. Nunc quis lacus urna.</p>
                            <br>
                            <div class="userbutton text-center">
                                <form action="/logout" method="post">
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2 my-button userbutton">LOG OUT</button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>