<!------------------------------------------------------------
Name: Kendall Shearman
Assignment: Coding Seven
Purpose: MVC Frameworks
Notes: No questions or comments at this time
--------------------------------------------------------------->
<main>
    <div id="msg" class="msg-style">
        <!-- This is a blank area for us to talk to the user -->
        <br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="" class="contact-form" id="contact-form" name="contact-form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required maxlength="64">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="remail1" id="email" placeholder="Your Email" required maxlength="64">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="remail2" id="reemail" placeholder="Re-Enter Email" required maxlength="64">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required maxlength="64">
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" id="message" placeholder="Your Message" maxlength="1000" rows="10"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" id="form-submit" class="btn my-button">Send</button>
                        <button type="button" id="clear-btn" class="btn my-button">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>