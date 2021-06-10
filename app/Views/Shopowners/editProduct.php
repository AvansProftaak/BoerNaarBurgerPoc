<!-- make a check to see if ower already has shop -->
<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3"><?php echo $lang['product_management']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['product_update']; ?></h2>
                    <hr class="mx-2">

                    <form method="POST" enctype="multipart/form-data" action="<?php echo URLROOT . '/shopowners/editproduct?product=' . $_GET['product'] ?>">

                        <!-- Shop name -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="product_name" class="pl-2 user-data-header"><?php echo $lang['product_name']; ?><span class="pl-3 text-danger"><?php if(isset($data['product_nameError'])) echo $data['product_nameError'];?></span></label>
                                <input id="product_name_nl" type="text" class="form-control rounded-borders input-icon-nl <?php if($data['product_nameError']) : ?> is-invalid <?php endif; ?>" name="product_name_nl" placeholder="Aardappelen loket" autocomplete="shop_name">
                                <input id="product_name_en" type="text" class="mt-2 form-control rounded-borders input-icon-en <?php if($data['product_nameError']) : ?> is-invalid <?php endif; ?>" name="product_name_en" placeholder="Aardappelen loket" autocomplete="shop_name">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- description -->
                            <div class="col-5">
                                <label for="product_description" class="pl-2 user-data-header"><?php echo $lang['product_description']; ?><span class="pl-3 text-danger"><?php if(isset($data['product_descriptionError'])) echo $data['product_descriptionError'];?></span></label>
                                <input id="product_description_nl" type="text" class="form-control rounded-borders input-icon-nl" name="product_description_nl" placeholder="Ik heb lekkere aardappelen" autocomplete="product_description_nl">
                                <input id="product_description_en" type="text" class="mt-2 form-control rounded-borders input-icon-en" name="product_description_en" placeholder="Ik heb lekkere aardappelen" autocomplete="product_description_en">

                            </div>
                        </div><br>

                        <div class="form-group row mx-1 mb-0">
                            <!-- address -->
                            <div class="col-5">
                                <label for="product_price" class="pl-2 user-data-header"><?php echo $lang['product_price']; ?><span class="pl-3 text-danger"><?php if(isset($data['product_priceError'])) echo $data['product_priceError'];?></span></label>
                                <input id="product_price" type="text" class="form-control rounded-borders" name="product_price" placeholder="1,50" autocomplete="product_price">
                            </div>

                            <!-- house_number -->
                            <div class="col-5">
                                <label for="product_stock" class="pl-2 user-data-header"><?php echo $lang['product_stock']; ?><span class="pl-3 text-danger"><?php if(isset($data['product_stockError'])) echo $data['product_stockError'];?></span></label>
                                <input id="product_stock" type="text" class="form-control rounded-borders" name="product_stock" placeholder="150" autocomplete="product_stock">
                            </div>
                        </div>
                            <!-- eddit Button -->
                            <div class="form-group row mb-3 mt-4">
                                <div class="ml-3 pl-3">
                                <button type="submit" formmethod="post" class="btn btn-green px-5"><?php echo $lang['product_update_button']; ?></button>
                                <a class="btn btn-green px-5 " href="<?php echo URLROOT; ?>/shopowners/productoverview"><?php echo $lang['my_shop']; ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
