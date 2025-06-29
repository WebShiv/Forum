<div class="modal fade" id="signupModalLabel" tabindex="-1" aria-labelledby="signupModalLabelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabelLabel">SignUp</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./partials/_signup_handler.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="user" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Passsword</label>
                        <input type="password" class="form-control" id="password" name="passsword"
                            placeholder="password">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">confirm Passsword</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword"
                            placeholder="confirm password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">SignUp</button>
                </div>
            </form>
        </div>
    </div>
</div>