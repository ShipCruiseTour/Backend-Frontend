<?php include_once APPROOT . '/views/inc/header.inc.php';
$noFooter ='';
?>
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <div class="card card-body p-3">
                <h2>Create Account</h2>
                <span class="mb-2">*Please fill all the information to Create your Account</span>
                <form action="<?= URLROOT ?>users/login" method="POST">
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
                    <div>
                        <input type="submit" value="Log In" class="btn btn-primary">
                        <a href="<?= URLROOT ?>users/register" class="btn btn-secondary">You Have not an account ? Register </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>