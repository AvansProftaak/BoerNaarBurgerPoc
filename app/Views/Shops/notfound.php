<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div class="pt-4">
        <h3 class="font-weight-bolder">Geen shop gevonden.</h3>
    </div>

    <div class="pt-4">
        <p>Helaas hebben wij de shop niet kunnen vinden. Ga terug naar het <a href="<?php echo URLROOT; ?>/shops/overview">shop overzicht</a> en probeer het opnieuw. <br><br>
            Blijven de problemen bestaan? Neem dan <a href="<?php echo URLROOT; ?>/pages/contact">contact</a> op met Boer naar Burger.</p>
    </div>

    <div class="text-right pt-4 pb-lg-5">
        <button type="submit" onclick="window.location='<?php echo URLROOT; ?>/shops/overview'" class="btn btn-green btn-padding">Terug naar het overzicht</button>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
