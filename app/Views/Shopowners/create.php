
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

                    <form method="POST" action="<?php echo URLROOT; ?>/shopowners/create">
                        <div class="form-group row mx-1">
                            <!-- KVK -->
                            <div class="col-5">
                                <label for="kvk_number" class="pl-2 user-data-header">kvk nummer<span class="pl-3 text-danger"><?php echo $data['kvk_numberError'] ?></span></label>
                                <input id="kvk_number" type="text" class="form-control rounded-borders <?php if($data['kvk_numberError']) : ?> is-invalid <?php endif; ?>" placeholder="KVK nummer" name="kvk_number" autocomplete="kvk_number">
                            </div>
                        </div>

                        <!-- Shop name -->
                        <div class="form-group row mx-1 mb-0">
                            <div class="col-5">
                                <label for="shop_name" class="pl-2 user-data-header">shop naam<span class="pl-3 text-danger"><?php echo $data['shop_nameError'] ?></span></label>
                                <input id="shop_name" type="text" class="form-control rounded-borders <?php if($data['shop_nameError']) : ?> is-invalid <?php endif; ?>" name="shop_name" placeholder="Aardappelen loket" autocomplete="shop_name">
                            </div>
                        </div>
                        
                        <div class="form-group row mx-1 mb-0">
                            <!-- stad -->
                            <div class="col-5">
                                <label for="city" class="pl-2 user-data-header">Stad<span class="pl-3 text-danger"><?php echo $data['cityError'] ?></span></label>
                                <input id="city" type="text" class="form-control rounded-borders <?php if($data['cityError']) : ?> is-invalid <?php endif; ?>" name="city" placeholder="Amsterdam" autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="address" class="pl-2 user-data-header">Straatnaam<span class="pl-3 text-danger"><?php echo $data['addressError'] ?></span></label>
                                <input id="address" type="text" class="form-control rounded-borders <?php if($data['addressError']) : ?> is-invalid <?php endif; ?>" name="address" placeholder="Langedreef" autocomplete="address">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="house_number" class="pl-2 user-data-header">huisnummer<span class="pl-3 text-danger"><?php echo $data['house_numberError'] ?></span></label>
                                <input id="house_number" type="text" class="form-control rounded-borders <?php if($data['house_numberError']) : ?> is-invalid <?php endif; ?>" name="house_number" placeholder="19" autocomplete="house_number">
                            </div>
                        </div>


                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="postal_code" class="pl-2 user-data-header">Postcode<span class="pl-3 text-danger"><?php echo $data['postal_codeError'] ?></span></label>
                                <input id="postal_code" type="text" class="form-control rounded-borders <?php if($data['postal_codeError']) : ?> is-invalid <?php endif; ?>" name="postal_code" placeholder="4783RE" autocomplete="postal_code">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="country" class="pl-2 user-data-header">Land<span class="pl-3 text-danger"><?php echo $data['countryError'] ?></span></label>
                                <input id="country" type="text" class="form-control rounded-borders <?php if($data['countryError']) : ?> is-invalid <?php endif; ?>" name="country" placeholder="Nederland" autocomplete="country">
                            </div>
                        </div>


                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="open_from" class="pl-2 user-data-header">Open vanaf<span class="pl-3 text-danger"><?php echo $data['open_fromError'] ?></span></label>
                                <input id="open_from" type="text" class="form-control rounded-borders <?php if($data['open_fromError']) : ?> is-invalid <?php endif; ?>" name="open_from" placeholder="9:00" autocomplete="open_from">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="closed_at" class="pl-2 user-data-header">Land<span class="pl-3 text-danger"><?php echo $data['closed_atError'] ?></span></label>
                                <input id="closed_at" type="text" class="form-control rounded-borders <?php if($data['closed_atError']) : ?> is-invalid <?php endif; ?>" name="closed_at" placeholder="17:00" autocomplete="closed_at">
                            </div>
                        </div>

                        <div class="form-group row mx-1 mb-0">
                            <!-- description -->
                            <div class="col-5">
                                <label for="description" class="pl-2 user-data-header">beschijving van de shop<span class="pl-3 text-danger"><?php echo $data['descriptionError'] ?></span></label>
                                <input id="description" type="text" class="form-control rounded-borders <?php if($data['descriptionError']) : ?> is-invalid <?php endif; ?>" name="description" placeholder="Ik heb lekkere aardappelen" autocomplete="description">
                            </div>
                        </div><br>

                        <h5 class="pt-4 pl-4 data-headers">Optioneel</h5>
                        <div class="form-group row mx-1 mb-0">
                            <!-- description -->
                            <div class="col-5">
                                <label for="banner_url" class="pl-2 user-data-header">Foto URL<span class="pl-3 text-danger"><?php echo $data['banner_urlError'] ?></span></label>
                                <input id="banner_url" type="text" class="form-control rounded-borders <?php if($data['banner_urlError']) : ?> is-invalid <?php endif; ?>" name="banner_url" placeholder="http://tiniurl.hackmij.com" autocomplete="banner_url">
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