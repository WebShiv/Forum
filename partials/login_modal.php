<div class="modal fade" id="loginModalLabel" tabindex="-1" aria-labelledby="loginModalLabelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabelLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./partials/_login_handler.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="Loginuser" class="form-label">Username</label>
                        <input type="text" class="form-control" id="Loginuser" name="Loginuser" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="loginpassword" class="form-label">Passswordd</label>
                        <input type="password" class="form-control" id="loginpassword" name="loginpassword"
                            placeholder="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>