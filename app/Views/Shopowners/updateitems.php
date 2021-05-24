<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3">Pas uw shop aan</h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers">Shop registreren</h2>
                    <hr class="mx-2">

                    <form method="POST" action="<?php echo URLROOT; ?>/shopowners/updateitems">

                    <!--
                        Wat hebben we hier nodig
                        als eerste moet gekeken worden welke shops de shopowner heeft
                        deze kunnen selecteren
                        item toevoegen
                        bestaande items aanpassen
                        updaten naar db
                    -->

                        <!-- item to sell -->
                        <div class="form-group row mx-1 mb-0">
                            <div class="col-5">
                                <label for="item_name" class="pl-2 user-data-header">Product<span class="pl-3 text-danger"><?php echo $data['item_nameError'] ?></span></label>
                                <input id="item_name" type="text" class="form-control rounded-borders <?php if($data['item_nameError']) : ?> is-invalid <?php endif; ?>" name="item_name" placeholder="Aardappelen" autocomplete="item_name">
                            </div>
                        </div>

                        <div class="form-group row mx-1 mb-0">
                            <!-- description -->
                            <div class="col-5">
                                <label for="description" class="pl-2 user-data-header">beschijving van het product<span class="pl-3 text-danger"><?php echo $data['descriptionError'] ?></span></label>
                                <input id="description" type="text" class="form-control rounded-borders <?php if($data['descriptionError']) : ?> is-invalid <?php endif; ?>" name="description" placeholder="Ik heb lekkere aardappelen" autocomplete="description">
                            </div>
                        </div><br><br>

                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="price" class="pl-2 user-data-header">prijs<span class="pl-3 text-danger"><?php echo $data['priceError'] ?></span></label>
                                <input id="price" type="text" class="form-control rounded-borders <?php if($data['priceError']) : ?> is-invalid <?php endif; ?>" name="price" placeholder="1,50" autocomplete="price">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="stock" class="pl-2 user-data-header">voorraad<span class="pl-3 text-danger"><?php echo $data['stockError'] ?></span></label>
                                <input id="stock" type="text" class="form-control rounded-borders <?php if($data['stockError']) : ?> is-invalid <?php endif; ?>" name="stock" placeholder="150" autocomplete="stock">
                            </div>
                        </div></br>

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