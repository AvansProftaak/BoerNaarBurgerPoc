<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3"><?php echo $lang['register_left_so']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['register_account']; ?></h2>
                    <hr class="mx-2">

                    <form method="POST" action="<?php echo URLROOT; ?>/shopowners/register">
                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['first_name']; ?>*<span class="pl-3 text-danger"><?php echo $data['firstNameError'] ?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['firstNameError']) : ?> is-invalid <?php endif; ?>" placeholder="Jan" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['last_name']; ?>*<span class="pl-3 text-danger"><?php echo $data['lastNameError'] ?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders <?php if($data['lastNameError']) : ?> is-invalid <?php endif; ?>" placeholder="Bakker" name="last_name" autocomplete="lname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?>*<span class="pl-3 text-danger"><?php echo $data['emailError'] ?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>"
                                       name="email" placeholder="<?php if($_SESSION['lang'] == 'nl') : ?>email@voorbeeld.nl <?php else : ?>email@example.com<?php endif; ?>" autocomplete="email">
                            </div>

                            <!-- Password -->
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?>*</label>
                                <input id="password" type="password" class="form-control rounded-borders <?php if($data['passwordError']) : ?> is-invalid <?php endif; ?>" name="password" autocomplete="new-password">
                                <span class="pl-3 text-danger user-data-header mr-5"><?php echo $data['passwordError'] ?></span>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col">
                                <label for="password-confirm" class="pl-2 user-data-header"><?php echo $lang['password_confirm']; ?>*</span></label>
                                <input id="password_confirmation" type="password" class="form-control rounded-borders <?php if($data['confirmPasswordError']) : ?> is-invalid <?php endif; ?>" name="password_confirmation" autocomplete="new-password">
                                <span class="pl-3 text-danger user-data-header"><?php echo $data['confirmPasswordError'] ?></span>
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- Street -->
                            <div class="col-4">
                                <label for="address" class="pl-2 user-data-header"><?php echo $lang['street']; ?></label>
                                <input id="address" type="text" class="form-control rounded-borders" placeholder="Langedreef" name="address" autocomplete="street">
                            </div>
                            <!-- Housenumber -->
                            <div class="col-2">
                                <label for="house_number" class="pl-2 user-data-header"><?php echo $lang['house_number']; ?></label>
                                <input id="house_number" type="text" class="form-control rounded-borders" placeholder="19" name="house_number" autocomplete="housenumber">
                            </div>
                            <!-- Zipcode -->
                            <div class="col-sm-2">
                                <label for="postal_code" class="pl-2 user-data-header"><?php echo $lang['zipcode']; ?></label>
                                <input id="postal_code" type="text" class="form-control rounded-borders" placeholder="4783RE" name="postal_code" autocomplete="postal_code">
                            </div>
                            <!-- City -->
                            <div class="col">
                                <label for="city" class="pl-2 user-data-header"><?php echo $lang['city']; ?></label>
                                <input id="city" type="text" class="form-control rounded-borders" placeholder="Amsterdam" name="city" autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- Company Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['company_name']; ?>*<span class="pl-3 text-danger"><?php echo $data['companyNameError'] ?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['companyNameError']) : ?> is-invalid <?php endif; ?>" placeholder="Veehouderij Janssen B.V." name="company_name" autocomplete="company_name">
                            </div>
                            <!-- KVK Number -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['kvk_number']; ?>*<span class="pl-3 text-danger"><?php echo $data['kvkNumberError'] ?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders <?php if($data['kvkNumberError']) : ?> is-invalid <?php endif; ?>" placeholder="12345678" name="kvk_number" autocomplete="kvk_number">
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div class="form-group row mb-3 mt-4">
                            <div class="ml-3 pl-3">
                                <button type="submit" class="btn btn-green px-5"><?php echo $lang['register_button']; ?></button>
                                <p class="mt-4"><?php echo $lang['register_customer']; ?><a href="<?php echo URLROOT; ?>/customers/register"><?php echo $lang['here']; ?></a><?php echo $lang['register_customer2']; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
