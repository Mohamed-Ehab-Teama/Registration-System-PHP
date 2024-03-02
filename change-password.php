<?php include 'inc/header.php'; ?>




<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-4 border my-5 p-2">
                Change Password
            </h1>
            <div class="col-sm-6 mx-auto">

                <!-- If there is an error -->
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $_SESSION['error']; ?>
                        <?php unset($_SESSION['error']) ?>
                    </div>
                <?php endif; ?>
                <!-- In case of success -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['success']; ?>
                        <?php unset($_SESSION['success']) ?>
                    </div>
                <?php endif; ?>

                <div class="border p-5 my-3">
                    <form action="handler/change-password.php" method="POST">
                        <div class="form-group">
                            <input type="password" name="old_password" class="form-control" placeholder="Old Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-block btn-primary" value="Change Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>













<?php include 'inc/footer.php'; ?>