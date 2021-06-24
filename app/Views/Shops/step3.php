<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div class="pt-4">
        <h3 class="font-weight-bolder"><?php echo $lang['test_phase']; ?></h3>
    </div>

    <div class="pt-2">
        <p><?php echo $lang['develop_phase']; ?>
            <a href="mailto:info@boernaarburger.ml"><?php echo $lang['bnb_email']; ?></a>.</p>
    </div>

    <div class="pt-2">
        <h3 class="font-weight-bolder"><?php echo $lang['payment']; ?></h3>
    </div>

    <div class="pt-2">
        <p><?php echo $lang['simulate_pay']; ?></p>
    </div>

    <?php if (isset($_GET['failed'])) : ?>
        <div class="form-group row mx-1 mb-0">
            <span class="pl-3 text-danger user-data-header mr-5"><?php echo $lang['finalize_fail']; ?></span>
        </div>
    <?php endif; ?>

    <div class="pt-2 d-flex">
        <form method="POST" action="<?php echo URLROOT . '/shops/step3?shop=' . $data['shop']->shop_number; ?>">
            <button type="submit" name="success" class="btn btn-green btn-padding mr-2"><?php echo $lang['success']; ?></button>
        </form>
        <form method="POST" action="<?php echo URLROOT . '/shops/step3?shop=' . $data['shop']->shop_number; ?>">
            <button type="submit" name="failed" class="btn btn-bnb-secondary btn-padding mr-2"><?php echo $lang['failed']; ?></button>
        </form>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
