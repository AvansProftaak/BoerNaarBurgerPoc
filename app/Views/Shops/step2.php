<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div class="pt-4">
        <h3 class="font-weight-bolder">Overzicht bestelling bij <strong><?php echo $this->getTranslation($data['shop']->shop_name, $_SESSION['lang']); ?></strong></h3>
    </div>

    <hr class="shop-border m-0 order-overview-width">

    <div class="pt-2 border-shop order-overview-width">
        <?php foreach ($data['orderDetails'] as $orderItem): ?>
        <!-- start orderdetails row -->
        <div class="pt-2 d-flex justify-content-between align-items-baseline border-shop">
            <p class="mb-2"><?php echo $orderItem->amount; ?>x</p>
            <p class="mb-2"><?php echo $this->getTranslation($orderItem->product, $_SESSION['lang']); ?></p>
            <p class="mb-2">€<?php echo $orderItem->price; ?></p>
        </div>
        <!-- end orderdetails row -->
        <?php endforeach; ?>
        <div class="pt-2 d-flex justify-content-between align-items-baseline">
            <p class="mb-2 font-weight-bold"><?php echo $lang['total']; ?>:</p>
            <p class="mb-2 font-weight-bold">€<?php echo $data['order']->orderamount_incl_tax; ?></p>
        </div>
    </div>

    <div class="pt-4">
        <h3 class="font-weight-bolder"><?php echo $lang['your_details']; ?></h3>
    </div>

    <div class="pt-2">
        <form method="POST" action="<?php echo URLROOT . '/shops/step2?shop=' . $data['shop']->shop_number; ?>">
            <div class="form-group row">
                <!-- First Name -->
                <div class="col-5">
                    <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['first_name']; ?></label>
                    <input id="first_name" type="text" class="form-control rounded-borders shop-form-background input-field" placeholder="<?php echo $lang['first_name']; ?>" disabled
                           value="<?php if(!empty($data['customer'])) {echo $data['customer']->first_name;} ?>" name="first_name" autocomplete="fname">
                </div>
                <!-- Last Name -->
                <div class="col">
                    <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['last_name']; ?></label>
                    <input id="last_name" type="text" class="form-control rounded-borders shop-form-background input-field" placeholder="<?php echo $lang['last_name']; ?>" disabled
                           value="<?php if(!empty($data['customer'])) {echo $data['customer']->last_name;} ?>" name="last_name" autocomplete="lname">
                </div>
            </div>

            <!-- E-mail Address -->
            <div class="form-group row px-0">
                <div class="col">
                    <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?></label>
                    <input id="email" type="email" class="form-control rounded-borders shop-form-background input-field" name="email" disabled
                           placeholder="<?php echo $lang['email']; ?>" value="<?php if(!empty($data['customer'])) {echo $data['customer']->email;} ?>" autocomplete="email">
                </div>
            </div>

            <div class="form-group row mx-1">
                <!-- Street -->
                <div class="col-8 px-0">
                    <label for="street" class="pl-2 user-data-header"><?php echo $lang['street']; ?></label>
                    <input id="street" type="text" class="form-control rounded-borders shop-form-background input-field" placeholder="<?php echo $lang['street']; ?>" disabled
                           name="street" autocomplete="street" value="<?php if(!empty($data['customer'])) {echo $data['customer']->address;} ?>">
                </div>
                <!-- Housenumber -->
                <div class="col-4 pl-4 pr-0">
                    <label for="house_number" class="pl-2 user-data-header"><?php echo $lang['house_number']; ?></label>
                    <input id="house_number" type="text" class="form-control rounded-borders shop-form-background input-field" placeholder="<?php echo $lang['house_number']; ?>" disabled
                           name="house_number" autocomplete="housenumber" value="<?php if(!empty($data['customer'])) {echo $data['customer']->house_number;} ?>">
                </div>
            </div>

            <div class="form-group row mx-1">
                <!-- Zipcode -->
                <div class="col px-0">
                    <label for="zipcode" class="pl-2 user-data-header"><?php echo $lang['zipcode']; ?></label>
                    <input id="zipcode" type="text" class="form-control rounded-borders shop-form-background input-field" placeholder="<?php echo $lang['zipcode']; ?>" disabled
                           name="postal_code" autocomplete="postal_code" value="<?php if(!empty($data['customer'])) {echo $data['customer']->postal_code;} ?>">
                </div>
                <!-- City -->
                <div class="col pl-4 pr-0">
                    <label for="city" class="pl-2 user-data-header"><?php echo $lang['city']; ?></label>
                    <input id="city" type="text" class="form-control rounded-borders shop-form-background input-field" placeholder="<?php echo $lang['city']; ?>" disabled
                           name="city" autocomplete="city" value="<?php if(!empty($data['customer'])) {echo $data['customer']->city;} ?>">
                </div>
            </div>

            <div id="password-field" class="form-group row mx-1 hide-button">
                <div class="col px-0">
                    <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?></label>
                    <input id="password" type="password" class="form-control rounded-borders shop-form-background input-field"  disabled name="password" required autocomplete="new-password">
                </div>
            </div>

            <?php if (isset($_GET['failed'])) : ?>
                <div class="form-group row mx-1 mb-0">
                    <span class="pl-3 text-danger user-data-header mr-5"><?php echo $lang['edit_failed']; ?></span>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])) : ?>
                <div class="form-group row mx-1 mb-0">
                    <span class="pl-3 text-success user-data-header mr-5"><?php echo $lang['edit_success']; ?></span>
                </div>
            <?php endif; ?>

            <div class="form-group row mx-1">
                <button id="edit-details-button" type="button" class="btn btn-green btn-padding"><?php echo $lang['edit_details']; ?></button>
            </div>

            <div class="form-group row mx-1 d-flex justify-content-between">
                <button type="button" class="edit-buttons btn btn-green btn-padding hide-button" onclick="cancelEdit()"><?php echo $lang['cancel']; ?></button>
                <button type="submit" name="edit-details" class="edit-buttons btn btn-green btn-padding hide-button"><?php echo $lang['save']; ?></button>
            </div>
        </form>

        <form method="POST" action="<?php echo URLROOT . '/shops/step3?shop=' . $data['shop']->shop_number; ?>">
            <!-- select payment method -->
            <div class="form-group row mx-1">
                <label for="payment-method" class="pl-2 user-data-header"><?php echo $lang['payment_method']; ?></label>
                <select class="form-control rounded-borders shop-form-background">
                    <option><?php echo $lang['ideal']; ?></option>
                    <option><?php echo $lang['mastercard']; ?></option>
                    <option><?php echo $lang['visa']; ?></option>
                    <option><?php echo $lang['paypal']; ?></option>
                </select>
            </div>

            <!-- privacy policy agreement -->
            <div class="form-group row mx-1 pt-2">
                <div class="col align-items-baseline px-0">
                    <div class="form-check">
                        <input class="form-check-input mt-2" type="checkbox" name="has_accepted_terms" id="has_accepted_terms">
                        <label class="pl-2 user-data-header" for="has_accepted_terms">
                            <?php echo $lang['agree_terms']; ?><a href="../pdf/terms<?php echo $_SESSION['lang']; ?>.pdf"><?php echo $lang['t_and_c']; ?></a><?php echo $lang['and_the']; ?><a href="../pdf/privacy<?php echo $_SESSION['lang']; ?>.pdf"><?php echo $lang['privacy_policy']; ?></a><?php echo $lang['of_bnb']; ?>
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-4 pb-lg-5 d-flex justify-content-between">
                <button type="button" onclick="window.location='<?php echo URLROOT . '/shops/step1?shop=' . $data['shop']->shop_number?>'" class="btn btn-green btn-padding"><?php echo $lang['back']; ?></button>
                <button type="submit" name="pay" class="btn btn-green btn-padding"><?php echo $lang['pay']; ?></button>
            </div>
        </form>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
