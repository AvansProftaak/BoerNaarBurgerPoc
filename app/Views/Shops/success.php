<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div class="pt-4">
        <h3 class="font-weight-bolder">Betaling gelukt!</h3>
    </div>

    <div class="pt-4">
        <p>Bedankt voor uw bestelling bij <strong><?php echo $this->getTranslation($data['shop']->shop_name, $_SESSION['lang']); ?></strong>. Uw bestelling is succesvol afgerond. Binnen enkele minuten ontvangt
            u een bevestiging op het door u opgegeven e-mail adres.</p>
        <p><em><strong>Let op!</strong> Soms wordt e-mail onderschept door een spamfilter. Controleer daarom ook uw spambox
                indien u binnen enkele minuten geen e-mail ontvangen heeft. Niks ontvangen? Neem <a href="<?php echo URLROOT; ?>/pages/contact">contact</a> op met Boer naar Burger.</em></p>
    </div>

    <div class="text-right pt-4 pb-lg-5">
        <button type="submit" onclick="window.location='<?php echo URLROOT; ?>/shops/overview'" class="btn btn-green btn-padding">Terug naar het overzicht</button>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
