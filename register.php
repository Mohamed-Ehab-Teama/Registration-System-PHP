<?php include('inc/header.php');  ?>

<?php
if (isset($_SESSION['user_name'])) {
    header("location:index.php");
}
?>

<div class="container">
    <div class="row">
        <div class="col-12 ">
            <h1 class="text-center display-4 border my-5 p-2"> Register</h1>
        </div>

        <div class="col-sm-6 mx-auto">
            <!-- Success Message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success text-center">
                    <?php echo $_SESSION['success']; ?>
                    <?php unset($_SESSION['success']) ?>
                </div>
            <?php endif; ?>
            <!-- Error Message -->
            <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger text-center">
                    <?php echo $_SESSION['error']; ?>
                    <?php unset($_SESSION['error']) ?>
                </div>
            <?php endif; ?>
            <div class="border p-5 my-3">
                <form action="handler/register.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobile" placeholder="Your Mobile">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Your Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Register" class="btn btn-block btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php');  ?>