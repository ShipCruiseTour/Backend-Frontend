<?php include_once APPROOT . '/views/inc/header.inc.php';
$noFooter ='';
?>
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card card-body p-3">
                <h2>Create Account</h2>
                <span class="mb-2">*Please fill all the information to Create your Account</span>
                <form action="<?= URLROOT ?>users/register" method="POST">
                    <!-- name input -->
                    <div class="form-group">
                        <span for="name">Name<sup>*</sup></span>
                        <input type="text" name="userName" value="<?=$data['name']?>" class="form-control form-control-lg <?= (!empty($data['name_err']) ? 'is-invalid' : '') ?>">
                        <span class="invalid-feedback"><?= $data['name_err'] ?></span>
                    </div>
                    <!-- email input -->
                    <div class="form-group">
                        <span for="email">Email<sup>*</sup></span>
                        <input type="text" name="userEmail" value="<?=$data['email']?>" class="form-control form-control-lg <?= (!empty($data['email_err']) ? 'is-invalid' : '') ?>">
                        <span class="invalid-feedback"><?= $data['email_err'] ?></span>
                    </div>
                    <!-- password input -->
                    <div class="form-group">
                        <span for="password">Password<sup>*</sup></span>
                        <input type="password" name="userPassword" value="<?=$data['password']?>" class="form-control form-control-lg <?= (!empty($data['password_err']) ? 'is-invalid' : '') ?>">
                        <span class="invalid-feedback"><?= $data['password_err'] ?></span>
                    </div>
                    <!-- password-confirm input -->
                    <div class="form-group">
                        <span for="confirm-password">Password confirm<sup>*</sup></span>
                        <input type="password" name="userConfirmPassword" value="<?=$data['confirm-password']?>" class="form-control form-control-lg <?= (!empty($data['confirm-password_err']) ? 'is-invalid' : '') ?>">
                        <span class="invalid-feedback"><?= $data['confirm-password_err'] ?></span>
                    </div>
                    <div>
                        <input type="submit" value="Register" class="btn btn-success">
                        <a href="<?= URLROOT ?>users/login" class="btn btn-secondary">Have you an account ? Log In </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>