
<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3">Maak een nieuwe shop</h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers">Shop registreren</h2>
                    <hr class="mx-2">

                    <form method="POST" enctype="multipart/form-data" action="<?php echo URLROOT; ?>/shopowners/create">

                        <!-- Shop name -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="shop_name" class="pl-2 user-data-header">shop naam<span class="pl-3 text-danger"><?php if(isset($data['shop_nameError'])) echo $data['shop_nameError'];?></span></label>
                                <input id="shop_name_nl" type="text" class="form-control rounded-borders input-icon-nl <?php if($data['shop_nameError']) : ?> is-invalid <?php endif; ?>" name="shop_name_nl" placeholder="Aardappelen loket" autocomplete="shop_name">
                                <input id="shop_name_en" type="text" class="mt-2 form-control rounded-borders input-icon-en <?php if($data['shop_nameError']) : ?> is-invalid <?php endif; ?>" name="shop_name_en" placeholder="Aardappelen loket" autocomplete="shop_name">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- description -->
                            <div class="col-5">
                                <label for="description" class="pl-2 user-data-header">beschijving van de shop<span class="pl-3 text-danger"><?php if(isset($data['descriptionError'])) echo $data['descriptionError'];?></span></label>
                                <input id="description_nl" type="text" class="form-control rounded-borders input-icon-nl" name="description_nl" placeholder="Ik heb lekkere aardappelen" autocomplete="description">
                                <input id="description_en" type="text" class="mt-2 form-control rounded-borders input-icon-en" name="description_en" placeholder="Ik heb lekkere aardappelen" autocomplete="description">

                            </div>
                        </div><br><br>

                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="address" class="pl-2 user-data-header">Straatnaam<span class="pl-3 text-danger"><?php if(isset($data['addressError'])) echo $data['addressError'];?></span></label>
                                <input id="address" type="text" class="form-control rounded-borders" name="address" placeholder="Langedreef" autocomplete="address">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="house_number" class="pl-2 user-data-header">huisnummer<span class="pl-3 text-danger"><?php if(isset($data['house_numberError'])) echo $data['house_numberError'];?></span></label>
                                <input id="house_number" type="text" class="form-control rounded-borders" name="house_number" placeholder="19" autocomplete="house_number">
                            </div>
                        </div>


                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="postal_code" class="pl-2 user-data-header">Postcode<span class="pl-3 text-danger"><?php if(isset($data['postal_codeError'])) echo $data['postal_codeError'];?></span></label>
                                <input id="postal_code" type="text" class="form-control rounded-borders" name="postal_code" placeholder="4783RE" autocomplete="postal_code">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="country" class="pl-2 user-data-header">Land<span class="pl-3 text-danger"><?php if(isset($data['countryError'])) echo $data['countryError'];?></span></label>
                                <input id="country" type="text" class="form-control rounded-borders" name="country" placeholder="Nederland" autocomplete="country">
                            </div>
                        </div>

                        <div class="form-group row mx-1 mb-0">
                            <!-- stad -->
                            <div class="col-5">
                                <label for="city" class="pl-2 user-data-header">Stad<span class="pl-3 text-danger"><?php if(isset($data['cityError'])) echo $data['cityError'];?></span></label>
                                <input id="city" type="text" class="form-control rounded-borders" name="city" placeholder="Amsterdam" autocomplete="city">
                            </div>
                        </div><br><br>

                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="open_from" class="pl-2 user-data-header">Open vanaf<span class="pl-3 text-danger"><?php if(isset($data['open_fromError'])) echo $data['open_fromError'];?></span></label>
                                <input id="open_from" type="text" class="form-control rounded-borders" name="open_from" placeholder="9:00" autocomplete="open_from">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="closed_at" class="pl-2 user-data-header">gesloten om<span class="pl-3 text-danger"><?php if(isset($data['closed_atError'])) echo $data['closed_atError'];?></span></label>
                                <input id="closed_at" type="text" class="form-control rounded-borders" name="closed_at" placeholder="17:00" autocomplete="closed_at">
                            </div>
                        </div><br>

                        <h5 class="pt-4 pl-4 data-headers">Afbeelding</h5>
                        <div class="form-group row mx-1 mb-0">
                            <!-- photo -->
                            <div class="col-5">
                                <label for="banner_url" class="pl-2 user-data-header">Foto URL<span class="pl-3 text-danger"><?php if(isset($data['banner_urlError'])) echo $data['banner_urlError'];?></span></label>
                                <input id="banner_url" type="file" name="banner_url" class="form-control rounded-borders" placeholder="http://tiniurl.hackmij.com" autocomplete="banner_url">
                            </div>
                        </div>

                            <!-- Register Button -->
                            <div class="form-group row mb-3 mt-4">
                                <div class="ml-3 pl-3">
                                <button type="submit" class="btn btn-green px-5">Registreer winkel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
