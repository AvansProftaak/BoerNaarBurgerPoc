<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div class="pt-4">
        <h3 class="font-weight-bolder"><?php echo $this->getTranslation($data['shop']->shop_name, $_SESSION['lang']); ?></h3>
    </div>
    <div class="pt-4">
        <h3 class="font-weight-bolder"><?php echo $lang['payment_cancel']; ?></h3>
    </div>

    <div class="pt-4">
        <p><?php echo $lang['cancel_text']; ?></p>
        <p><?php echo $lang['problems']; ?><a href="<?php echo URLROOT; ?>/pages/contact"><?php echo $lang['contact_lower']; ?></a><?php echo $lang['spam_2']; ?></p>
    </div>

    <div class="text-right pt-4 pb-lg-5">
        <button type="submit" onclick="window.location='<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksAll=a_valuey'" class="btn btn-green btn-padding"><?php echo $lang['back_to_view']; ?></button>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
