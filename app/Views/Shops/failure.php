<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div class="pt-4">
        <h3 class="font-weight-bolder"><?php echo $this->getTranslation($data['shop']->shop_name, $_SESSION['lang']); ?></h3>
    </div>
    <div class="pt-4">
        <h3 class="font-weight-bolder">Betaling mislukt</h3>
    </div>

    <div class="pt-4">
        <p>Helaas is er iets misgegaan met uw bestelling. Ga terug naar de shop om het opnieuw te proberen.</p>
        <p>Blijft u problemen ervaren? Neem dan <a href="<?php echo URLROOT; ?>/pages/contact">contact</a> op met Boer naar Burger.</p>
    </div>

    <div class="text-right pt-4 pb-lg-5">
        <button type="submit" onclick="window.location='<?php echo URLROOT; ?>/shops/overview'" class="btn btn-green btn-padding">Terug naar het overzicht</button>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
