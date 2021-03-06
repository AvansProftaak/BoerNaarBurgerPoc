<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        
                        <h3 class="white-text p-3"><?php echo $lang['name']; ?></br><?php echo $data['full_name']; ?></h3>
                        <h3 class="white-text p-3">KVK:</br><?php echo $data['kvk_number']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['personal_data']; ?></h2>
                    <hr class="mx-2">

                    <form action="<?php echo URLROOT; ?>/shopowners/accountDetails" method="POST" enctype="multipart/form-data">

                    <div class="form-group row mx-1">
                            <!-- company Name -->
                            <div class="col-5">
                                <label for="company_name" class="pl-2 user-data-header"><?php echo $lang['company_name']; ?><span class="pl-3 text-danger"><?php echo $data['company_nameError'] ?></span></label>
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
        </div>
                
        <div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <div>
                            <img src="../img<?php echo $data['banner_url'] ?>" class="rounded-circle w-75 profile-photo" alt="shop image"/>
                        </div>
                        <h3 class="white-text p-3"><?php echo $_SESSION['company_name']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['company_data']; ?></h2>
                    <hr class="mx-2">

                    <form action="<?php echo URLROOT; ?>/shopowners/accountDetails" method="POST" enctype="multipart/form-data">

                    <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="shop_name" class="pl-2 user-data-header"><?php echo $lang['shop_name']; ?><span class="pl-3 text-danger"><?php if(isset($data['shop_nameError'])) echo $data['shop_nameError'];?></span></label>
                                <input id="shop_name_nl" type="text" class="form-control rounded-borders input-icon-nl <?php if($data['shop_nameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['shop_name_nl']; ?>" name="shop_name_nl" placeholder="Aardappelen boerderij" autocomplete="shop_name">
                                <input id="shop_name_en" type="text" class="mt-2 form-control rounded-borders input-icon-en <?php if($data['shop_nameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['shop_name_en']; ?>" name="shop_name_en" placeholder="potatoes farm" autocomplete="shop_name">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- description -->
                            <div class="col-5">
                                <label for="description" class="pl-2 user-data-header"><?php echo $lang['shop_description']; ?><span class="pl-3 text-danger"><?php if(isset($data['descriptionError'])) echo $data['descriptionError'];?></span></label>
                                <input id="description_nl" type="text" class="mt-2 form-control rounded-borders input-icon-nl <?php if($data['description_nlError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['description_nl']; ?>" name="description_nl" placeholder="Ik heb lekkere aardappelen" autocomplete="description">
                                <input id="description_en" type="text" class="mt-2 form-control rounded-borders input-icon-en <?php if($data['description_enError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['description_en']; ?>" name="description_en" placeholder="Ik heb lekkere aardappelen" autocomplete="description">

                            </div>
                        </div><br><br>

                        <div class="form-group row mx-1">
                            <!-- Street -->
                            <div class="col-4">
                                <label for="shop_address" class="pl-2 user-data-header"><?php echo $lang['street']; ?></label>
                                <input id="shop_address" type="text" class="form-control rounded-borders" value="<?php echo $data['shop_address']; ?>" name="shop_address" autocomplete="shop_address">
                            </div>
                            <!-- Housenumber -->
                            <div class="col-2">
                                <label for="shop_house_number" class="pl-2 user-data-header"><?php echo $lang['house_number']; ?></label>
                                <input id="shop_house_number" type="text" class="form-control rounded-borders" value="<?php echo $data['shop_house_number']; ?>" name="shop_house_number" autocomplete="shop_house_number">
                            </div>
                            <!-- Zipcode -->
                            <div class="col-sm-2">
                                <label for="shop_postal_code" class="pl-2 user-data-header"><?php echo $lang['zipcode']; ?></label>
                                <input id="shop_postal_code" type="text" class="form-control rounded-borders" value="<?php echo $data['shop_postal_code']; ?>" name="shop_postal_code" autocomplete="shop_postal_code">
                            </div>
                            <!-- City -->
                            <div class="col">
                                <label for="shop_city" class="pl-2 user-data-header"><?php echo $lang['city']; ?></label>
                                <input id="shop_city" type="text" class="form-control rounded-borders" value="<?php echo $data['shop_city']; ?>" name="shop_city" autocomplete="shop_city">
                            </div>
                        </div>

                        <h5 class="pt-4 pl-4 data-headers"><?php echo $lang['shop_image']; ?></h5>
                        <div class="form-group row mx-1 mb-0">
                            <!-- photo -->
                            <div class="col-5">
                                <label for="banner_url" class="pl-2 user-data-header"><span class="pl-3 text-danger"><?php if(isset($data['photoError'])) echo $data['photoError'];?></span></label>
                                <input id="banner_url" type="file" name="banner_url" class="form-control rounded-borders" placeholder="/downloads/image.png" autocomplete="banner_url">

                            </div>
                        </div></br>

                        <div class="form-group row mb-3 d-flex justify-content-between">
                            <div class="ml-3 pl-3">
                            <button name = "submit-company-data" type="submit" class="btn btn-green"><?php echo $lang['save_personal_data']; ?></button>
                            </div>
                            <div class="mr-3 pr-3">
                            <a type="button" href="<?php echo URLROOT; ?>/shopowners/orderoverview" class="btn btn-green"><?php echo $lang['orders']; ?></a>
                            </div>
                            <div class="mr-3 pr-3">
                            <a type="button" href="<?php echo URLROOT; ?>/shopowners/productoverview" class="btn btn-green"><?php echo $lang['product_management']; ?></a>
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