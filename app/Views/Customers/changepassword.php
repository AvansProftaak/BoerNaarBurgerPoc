<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row account-profile-card">
                <div class="col-4 text-center pt-4 green-background">
                    <div>
                        <img src="<?php if($_SESSION['lang'] == 'nl') : ?>../img/noimage.png<?php else : ?>../img/noimageEN.png<?php endif; ?>" alt="Profile Picture" class="rounded-circle w-75 profile-photo"/>
                        <h3 class="white-text p-3"><?php echo $_SESSION['customer_name']; ?></h3>
                    </div>
                </div>
                <div class="col pr-2">
                    <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['change_password']; ?></h2>
                    <hr class="mx-2">
                    <form method="POST" action="<?php echo URLROOT; ?>/customers/changepassword">
                        <div class="col mt-3">
                            <p><?php echo $lang['pass_form']; ?></p>
                        </div>
                        <!-- Current Password -->
                        <div class="col">
                            <label for="current_password" class="pl-2 user-data-header"><?php echo $lang['current_password']; ?><span class="pl-3 text-danger user-data-header"><?php echo $data['currentPasswordError'] ?></span></label>
                            <input id="current_password" type="password" class="form-control rounded-borders <?php if($data['currentPasswordError']) : ?> is-invalid <?php endif; ?>" name="current_password" autocomplete="current_password">
                        </div>

                        <!-- New Password -->
                        <div class="col">
                            <label for="password" class="pl-2 user-data-header"><?php echo $lang['new_password']; ?><span class="pl-3 text-danger user-data-header"><?php echo $data['passwordError'] ?></span></label>
                            <input id="password2" type="password" class="form-control rounded-borders <?php if($data['passwordError']) : ?> is-invalid <?php endif; ?>" name="password" autocomplete="new-password">
                        </div>

                        <!-- Confirm New Password -->
                        <div class="col mb-3">
                            <label for="password-confirm" class="pl-2 user-data-header"><?php echo $lang['password_confirm']; ?><span class="pl-3 text-danger user-data-header"><?php echo $data['confirmPasswordError'] ?></span></label>
                            <input id="password_confirmation" type="password" class="form-control rounded-borders <?php if($data['confirmPasswordError']) : ?> is-invalid <?php endif; ?>" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-3 justify-content-between">
                            <a type="button" href="<?php echo URLROOT; ?>/customers/accountdetails" class="mx-4 px-4 btn btn-bnb-secondary"><?php echo $lang['back']; ?></a>
                            <button type="submit" name="submit-change-password" class="mx-4 px-4 btn btn-green"><?php echo $lang['change_password']; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
