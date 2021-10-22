<!-- Modal -->
<div class="modal fade" id="sigupModal" tabindex="-1" aria-labelledby="sigupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sigupModalLabel">Signup for an iDiscuss account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forum/handleSignup.php" method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="Signupemail" class="form-label">username</label>
                        <!--<input type="email" class="form-control" id="Signupemail" name="Signupemail"aria-describedby="emailHelp">-->
                        <input type="text" class="form-control" id="Signupemail" name="Signupemail"aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

                    </div>
                    <div class="mb-3">
                        <label for="Signuppassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Signuppassword" name="Signuppassword">
                    </div>
                    <div class="mb-3">
                        <label for="SignupCpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="SignupCpassword" name="SignupCpassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>


        </div>
    </div>
</div>