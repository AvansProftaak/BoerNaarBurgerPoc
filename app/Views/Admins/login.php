<?php include APPROOT . "/Views/Includes/header.php"; ?>

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row account-profile-card">
                <div class="col-4 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3"><?php echo $lang['welcome']; ?></h3>
                    </div>
                </div>
                <div class="col pr-2">
                    <h2 class="pt-4 pl-4 data-headers">Login Admin</h2>
                    <hr class="mx-2">
                    <form method="POST" action="<?php echo URLROOT; ?>/admins/login">
                        <!-- E-mail -->
                        <div class="form-group row mx-1">
                            <div class="col">
                                <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?><span class="pl-3 text-danger user-data-header"><?php if($data['emailError']) : echo $lang[$data['emailError']]; endif;?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>"
                                       name="email" placeholder="<?php if($_SESSION['lang'] == 'nl') : ?>email@voorbeeld.nl <?php else : ?>email@example.com<?php endif; ?>" autocomplete="email">
                            </div>
                        </div>

                        <!-- password -->
                        <div class="form-group row mx-1">
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?><span class="pl-3 text-danger user-data-header"><?php if($data['passwordError']) : echo $lang[$data['passwordError']]; endif;?></span></label>
                                <input id="password" type="password" class="form-control rounded-borders <?php if($data['passwordError']) : ?> is-invalid <?php endif; ?>" name="password" autocomplete="current-password">
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="form-group row mb-3">
                            <div class="ml-3 pl-3">
                                <button type="submit" name="submit" class="btn btn-green px-5"><?php echo $lang['login_button']; ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
