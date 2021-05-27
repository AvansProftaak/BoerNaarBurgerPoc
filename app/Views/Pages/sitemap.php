<?php include APPROOT."/Views/Includes/header.php";?>

    <div class="rh-main">

        <div class="sitemap">
            <h2>Sitemap</h2>
            <p>
                <h3><a href="<?php echo URLROOT; ?>/pages/index">Home</a></h3>
<br>
                <h3>Aanmelden</h3>
                    <li><a href="<?php echo URLROOT; ?>/customers/register">Registreren als burger</a></li>
                    <li><a href="<?php echo URLROOT; ?>/customers/login">Aanmelden als burger</a></li>
                    <li><a href="<?php echo URLROOT; ?>/customers/accountdetails">Mijn gegegevens - burger</a></li>
                    <li><a href="<?php echo URLROOT; ?>/customers/orderoverview">Mijn bestellingen - burger</a></li>
                    <li><a href="<?php echo URLROOT; ?>/shopowners/register">Registreren als boer</a></li>
                    <li><a href="<?php echo URLROOT; ?>/shopowners/login">Aanmelden als boer</a></li>
                    <li><a href="<?php echo URLROOT; ?>/shopowners/myshop">Mijn shop - boer</a></li>
            <br>
                <h3><a href=regio-keus2.html>Regio keuze</a></h3>
                    <li><a href=brabant-oost.html>Brabant Oost</a></li>
                    <li><a href=brabant-west.html>Brabant West</a></li>
                    <li><a href=brabant-midden.html>Brabant Midden</a></li>
                    <li><a href=zeeland.html>Zeeland</a></li>
            <br>
                <h3><a href="<?php echo URLROOT; ?>/pages/about"><?php echo $lang['about']; ?></a></h3>
            <br>
                <h3><a href="<?php echo URLROOT; ?>/pages/contact">Contactgegevens</a></h3>
                    <li><a href="<?php echo URLROOT; ?>/pages/faq"><?php echo $lang['faq']; ?></a></li>

            </p>
        </div>
     
    </div>
<?php include APPROOT."/Views/Includes/footer.php"; ?>