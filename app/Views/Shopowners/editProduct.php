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
                        <!-- here we need the product name -->
                        <h3 class="white-text p-3"><?php echo $_SESSION['company_name']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['product']; ?></h2>
                    <hr class="mx-2">

                    <form action="<?php echo URLROOT; ?>/shopowners/editproduct" method="POST">

                    <div class="form-group row mx-1">
                            <!-- company Name -->
                            <div class="col-5">
                                <label for="company_name" class="pl-2 user-data-header"><?php echo $lang['product_name']; ?><span class="pl-3 text-danger"><?php echo $data['company_nameError'] ?></span></label>
                                <input id="shop_name_nl" type="text" class="form-control rounded-borders input-icon-nl <?php if($data['shop_nameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['shop_name_nl']; ?>" name="shop_name_nl" placeholder="Aardappelen loket" autocomplete="shop_name">
                                <input id="shop_name_en" type="text" class="mt-2 form-control rounded-borders input-icon-en <?php if($data['shop_nameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['shop_name_en']; ?>" name="shop_name_en" placeholder="Aardappelen loket" autocomplete="shop_name">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['product_price']; ?><span class="pl-3 text-danger"><?php echo $data['firstNameError'] ?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['firstNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['first_name']; ?>" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col-5">
                                <label for="iban" class="pl-2 user-data-header"><?php echo $lang['product_stock']; ?><span class="pl-3 text-danger"><?php if(isset($data['ibanError'])) echo $data['ibanError'];?></span></label>
                                <input id="iban" type="text" class="form-control rounded-borders <?php if($data['ibanError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['iban']; ?>" name="iban" autocomplete="iban">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- iban -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['product_description']; ?><span class="pl-3 text-danger"><?php echo $data['lastNameError'] ?></span></label>
                                <input id="description_nl" type="text" class="mt-2 form-control rounded-borders input-icon-nl <?php if($data['description_nlError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['description_nl']; ?>" name="description_nl" placeholder="Ik heb lekkere aardappelen" autocomplete="description">
                                <input id="description_en" type="text" class="mt-2 form-control rounded-borders input-icon-en <?php if($data['description_enError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['description_en']; ?>" name="description_en" placeholder="Ik heb lekkere aardappelen" autocomplete="description">
                            </div>
                            
                        </div>

                        <h5 class="pt-4 pl-4 data-headers"><?php echo $lang['product_image']; ?></h5>
                        <div class="form-group row mx-1 mb-0">
                            <!-- photo -->
                            <div class="col-5">
                                <label for="photo" class="pl-2 user-data-header"><span class="pl-3 text-danger"><?php if(isset($data['photoError'])) echo $data['photoError'];?></span></label>
                                <input id="photo" type="file" name="photo" class="form-control rounded-borders" placeholder="/Downloads/mooiplaatje" autocomplete="photo">
                            </div>
                        </div></br>

                        <div class="form-group row mb-3 d-flex justify-content-between">
                            <div class="ml-3 pl-3">
                                <button name = "submit-personal-data" type="submit" class="btn btn-green"><?php echo $lang['product_update']; ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>