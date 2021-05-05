S
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

                    <form method="POST" action="<?php echo URLROOT; ?>/Shopowners/create">
                        <div class="form-group row mx-1">
                            <!-- ShopName -->
                            <div class="col-5">
                                <label for="shop_name" class="pl-2 user-data-header">Shopnaam<span class="pl-3 text-danger"><?php echo $data['shopNameError'] ?></span></label>
                                <input id="shop_name" type="text" class="form-control rounded-borders <?php if($data['shopNameError']) : ?> is-invalid <?php endif; ?>" placeholder="Shop Naam" name="shop_name" autocomplete="sname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1 mb-0">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header">E-Mailadres<span class="pl-3 text-danger"><?php echo $data['emailError'] ?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>" name="email" placeholder="email@voorbeeld.nl" autocomplete="email">
                            </div>

                            <!-- img -->
                            <!-- zoek uit hoe dit kan -->
                            <div class="col">
                                <label for="imglink" class="pl-2 user-data-header">Foto</label>
                                <input id="imglink" type="image" class="form-control rounded-borders <?php if($data['imagedError']) : ?> is-invalid <?php endif; ?>" name="image" autocomplete="image">
                            </div>

                            <!-- description -->
                            <div class="col">
                                <label for="description" class="pl-2 user-data-header">Beschrijving</label>
                                <input id="description" type="text" class="form-control rounded-borders <?php if($data['descriptionError']) : ?> is-invalid <?php endif; ?>" name="description" autocomplete="description">
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
