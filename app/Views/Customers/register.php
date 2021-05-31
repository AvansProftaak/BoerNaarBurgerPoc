<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3"><?php echo $lang['register_left']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['register_account']; ?></h2>
                    <hr class="mx-2">

                    <form method="POST" action="<?php echo URLROOT; ?>/customers/register">
                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['first_name']; ?><span class="pl-3 text-danger"><?php if($data['firstNameError']) : echo $lang[$data['firstNameError']]; endif;?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['firstNameError']) : ?> is-invalid <?php endif; ?>" placeholder="Jan" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['last_name']; ?><span class="pl-3 text-danger"><?php if($data['lastNameError']) : echo $lang[$data['lastNameError']]; endif;?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders <?php if($data['lastNameError']) : ?> is-invalid <?php endif; ?>" placeholder="Bakker" name="last_name" autocomplete="lname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1 mb-0">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?><span class="pl-3 text-danger"><?php if($data['emailError']) : echo $lang[$data['emailError']]; endif;?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>"
                                       name="email" placeholder="<?php if($_SESSION['lang'] == 'nl') : ?>email@voorbeeld.nl <?php else : ?>email@example.com<?php endif; ?>" autocomplete="email">
                            </div>

                            <!-- Password -->
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?></label>
                                <input id="password" type="password" class="form-control rounded-borders <?php if($data['passwordError']) : ?> is-invalid <?php endif; ?>" name="password" autocomplete="new-password">
                            </div>

                            <!-- Confirm Password -->
                            <div class="col">
                                <label for="password-confirm" class="pl-2 user-data-header"><?php echo $lang['password_confirm']; ?></span></label>
                                <input id="password_confirmation" type="password" class="form-control rounded-borders <?php if($data['confirmPasswordError']) : ?> is-invalid <?php endif; ?>" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row float-right mr-4 mt-0">
                            <span class="pl-3 text-danger user-data-header mr-5"><?php if($data['passwordError']) : echo $lang[$data['passwordError']]; endif;?></span>
                            <span class="pl-3 text-danger user-data-header"><?php if($data['confirmPasswordError']) : echo $lang[$data['confirmPasswordError']]; endif;?></span>
                        </div>

                        <?php if (isset($_GET['failed'])) : ?>
                        <div class="form-group row mx-1 mb-0">
                            <span class="pl-3 text-danger user-data-header mr-5"><?php echo $lang['register_failed']; ?></span>
                        </div>
                        <?php endif; ?>

                        <!-- Register Button -->
                        <div class="form-group row mb-3 mt-4">
                            <div class="ml-3 pl-3">
                                <button type="submit" class="btn btn-green px-5"><?php echo $lang['register_button']; ?></button>
                                <p class="mt-4"><?php echo $lang['register_shopowner']; ?><a href="<?php echo URLROOT; ?>/shopowners/register"><?php echo $lang['here']; ?></a><?php echo $lang['register_shopowner2']; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
