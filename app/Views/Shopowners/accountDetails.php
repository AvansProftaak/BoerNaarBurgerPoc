<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <div>
                            <img src="<?php if($_SESSION['lang'] == 'nl') : ?>../img/noimage.png<?php else : ?>../img/noimageEN.png<?php endif; ?>" alt="Profile Picture" class="rounded-circle w-75 profile-photo"/>
                            <a data-toggle="modal" data-target="#profilePictureModal"><img src ="../img/photo-icon.png" alt="camera-icon" class="photo-icon"></a>
                        </div>
                        <h3 class="white-text p-3"><?php echo $_SESSION['company_name']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['personal_data']; ?></h2>
                    <hr class="mx-2">

                    <form action="<?php echo URLROOT; ?>/shopowners/accountDetails" method="POST">
                    
                        <div class="form-group row mx-1">
                            <!-- company_name -->
                            <div class="col-5">
                                <label for="company_name" class="pl-2 user-data-header"><?php echo $lang['company_name']; ?><span class="pl-3 text-danger"><?php if(isset($data['company_nameError'])) echo $data['company_nameError'];?></span></label>
                                <input id="company_name" type="text" class="form-control rounded-borders <?php if($data['company_nameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['company_name']; ?>" name="company_name" autocomplete="cname">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['first_name']; ?><span class="pl-3 text-danger"><?php echo $data['firstNameError'] ?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['firstNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['first_name']; ?>" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['last_name']; ?><span class="pl-3 text-danger"><?php echo $data['lastNameError'] ?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders <?php if($data['lastNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['last_name']; ?>" name="last_name" autocomplete="lname">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- iban -->
                            <div class="col-5">
                                <label for="iban" class="pl-2 user-data-header"><?php echo $lang['iban']; ?><span class="pl-3 text-danger"><?php if(isset($data['ibanError'])) echo $data['ibanError'];?></span></label>
                                <input id="iban" type="text" class="form-control rounded-borders <?php if($data['ibanError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['iban']; ?>" name="iban" autocomplete="iban">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?><span class="pl-3 text-danger"><?php echo $data['emailError'] ?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>"
                                       name="email" value="<?php echo $data['email']; ?>" autocomplete="email">
                            </div>
                            <!-- password -->
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?><span class="pl-3 text-danger"><?php echo $data['passwordError'] ?></span></label>
                                <input id="password" type="password" class="form-control rounded-borders <?php if($data['passwordError']) : ?> is-invalid <?php endif; ?>" name="password" autocomplete="passwordd">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- phone_number -->
                            <div class="col-5">
                                <label for="phone_number" class="pl-2 user-data-header"><?php echo $lang['phone_number']; ?><span class="pl-3 text-danger"><?php if(isset($data['phone_numberError'])) echo $data['phone_numberError'];?></span></label>
                                <input id="phone_number" type="text" class="form-control rounded-borders <?php if($data['phone_numberError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['phone_number']; ?>" name="phone_number" autocomplete="phonenumber">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- Street -->
                            <div class="col-4">
                                <label for="address" class="pl-2 user-data-header"><?php echo $lang['street']; ?></label>
                                <input id="address" type="text" class="form-control rounded-borders" value="<?php echo $data['address']; ?>" name="address" autocomplete="street">
                            </div>
                            <!-- Housenumber -->
                            <div class="col-2">
                                <label for="house_number" class="pl-2 user-data-header"><?php echo $lang['house_number']; ?></label>
                                <input id="house_number" type="text" class="form-control rounded-borders" value="<?php echo $data['house_number']; ?>" name="house_number" autocomplete="housenumber">
                            </div>
                            <!-- Zipcode -->
                            <div class="col-sm-2">
                                <label for="postal_code" class="pl-2 user-data-header"><?php echo $lang['zipcode']; ?></label>
                                <input id="postal_code" type="text" class="form-control rounded-borders" value="<?php echo $data['postal_code']; ?>" name="postal_code" autocomplete="postal_code">
                            </div>
                            <!-- City -->
                            <div class="col">
                                <label for="city" class="pl-2 user-data-header"><?php echo $lang['city']; ?></label>
                                <input id="city" type="text" class="form-control rounded-borders" value="<?php echo $data['city']; ?>" name="city" autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row mb-3 d-flex justify-content-between">
                            <div class="ml-3 pl-3">
                                <button name = "submit-personal-data" type="submit" class="btn btn-green"><?php echo $lang['save_personal_data']; ?></button>
                            </div>
                            <div class="mr-3 pr-3">
                            <a type="button" href="<?php echo URLROOT; ?>/shopowners/changepassword" class="btn btn-green"><?php echo $lang['change_password']; ?></a>
                            </div>
                        </div>
                    </form>
                </div>
                </div>

                
                
                
                
                
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <div>
                            <img src="<?php if($_SESSION['lang'] == 'nl') : ?>../img/noimage.png<?php else : ?>../img/noimageEN.png<?php endif; ?>" alt="Profile Picture" class="rounded-circle w-75 profile-photo"/>
                            <a data-toggle="modal" data-target="#profilePictureModal"><img src ="../img/photo-icon.png" alt="camera-icon" class="photo-icon"></a>
                        </div>
                        <h3 class="white-text p-3"><?php echo $_SESSION['company_name']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['personal_data']; ?></h2>
                    <hr class="mx-2">

                    <form action="<?php echo URLROOT; ?>/shopowners/accountDetails" method="POST">
                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['first_name']; ?><span class="pl-3 text-danger"><?php echo $data['firstNameError'] ?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['firstNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['first_name']; ?>" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['last_name']; ?><span class="pl-3 text-danger"><?php echo $data['lastNameError'] ?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders <?php if($data['lastNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['last_name']; ?>" name="last_name" autocomplete="lname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?><span class="pl-3 text-danger"><?php echo $data['emailError'] ?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>"
                                       name="email" value="<?php echo $data['email']; ?>" autocomplete="email">
                            </div>
                            <!-- password -->
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?><span class="pl-3 text-danger"><?php echo $data['passwordError'] ?></span></label>
                                <input id="password" type="password" class="form-control rounded-borders <?php if($data['passwordError']) : ?> is-invalid <?php endif; ?>" name="password" autocomplete="passwordd">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- Street -->
                            <div class="col-4">
                                <label for="address" class="pl-2 user-data-header"><?php echo $lang['street']; ?></label>
                                <input id="address" type="text" class="form-control rounded-borders" value="<?php echo $data['address']; ?>" name="address" autocomplete="street">
                            </div>
                            <!-- Housenumber -->
                            <div class="col-2">
                                <label for="house_number" class="pl-2 user-data-header"><?php echo $lang['house_number']; ?></label>
                                <input id="house_number" type="text" class="form-control rounded-borders" value="<?php echo $data['house_number']; ?>" name="house_number" autocomplete="housenumber">
                            </div>
                            <!-- Zipcode -->
                            <div class="col-sm-2">
                                <label for="postal_code" class="pl-2 user-data-header"><?php echo $lang['zipcode']; ?></label>
                                <input id="postal_code" type="text" class="form-control rounded-borders" value="<?php echo $data['postal_code']; ?>" name="postal_code" autocomplete="postal_code">
                            </div>
                            <!-- City -->
                            <div class="col">
                                <label for="city" class="pl-2 user-data-header"><?php echo $lang['city']; ?></label>
                                <input id="city" type="text" class="form-control rounded-borders" value="<?php echo $data['city']; ?>" name="city" autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row mb-3 d-flex justify-content-between">
                            <div class="ml-3 pl-3">
                                <button name = "submit-personal-data" type="submit" class="btn btn-green"><?php echo $lang['save_personal_data']; ?></button>
                            </div>
                            <div class="mr-3 pr-3">
                            <a type="button" href="<?php echo URLROOT; ?>/customers/changepassword" class="btn btn-green"><?php echo $lang['change_password']; ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>