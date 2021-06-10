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
                    <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['product_import']; ?></h2>
                    <hr class="mx-2">
                    <form action="<?php echo URLROOT; ?>/shopowners/importProduct" method="POST" enctype="multipart/form-data">
                        <div class="form-group row mx-1">
                            <div class="col">
                                <p><?php echo $lang['import_text']; ?><a href="../csv/example_product_import_<?php echo $_SESSION['lang']; ?>.csv"><?php echo $lang['here']; ?></a><?php echo $lang['import_text_2']; ?></p>
                            </div>
                        </div>
                        <div class="form-group row mx-1">
                            <div class="col">
                                <label for="csv_import" class="pl-2 user-data-header"><?php echo $lang['import_label']; ?></label><br>
                                <span class="text-danger font-weight-bold"><?php // if($data['imageError']) : echo $lang[$data['imageError']]; endif; ?></span>
                                <input type="file" class="form-control-file" id="csv_import" name="csv_import">
                            </div>
                        </div>
                        <hr class="mx-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
