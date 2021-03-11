<?php include APPROOT."/Views/Includes/header.php"; ?>
<div class="container">
    <div class="welcome-images">
        <img class="logoBnB" src="../img/logo%20Boer%20naar%20burger_liggend_color.png" alt="logoBnB">
    </div>
    <div class="row">
        <div class="col-6">
            <h1 id="rh-column-links-header">Welkom bij Boer naar Burger</h1>
            <p class="rh-column-links-tekst">
                Wij bieden gezond en kwalitatief voedsel voor een (h)eerlijke prijs. Dagvers, rechtstreeks van het land!
                <br><br>
                Tonnen aan vers en heerlijk voedsel worden dagelijks weggegooid;
                groenten en fruit die net niet mooi genoeg zijn of overproductie die de boer niet kwijt kan bij de supermarkten.
                Wij zeggen: eeuwig zonde! Juist deze producten geven wij een bestemming, want ze zijn immers net zo vers en smakelijk. <br><br>
                Sluit je aan bij ons initiatief en bespaar tientallen euro's per maand, en
                <strong>maak een vuist tegen voedselverspilling!</strong>
            </p>
        </div>
        <div class="col-6">
            <h1 id="rh-column-rechts-header">Proof of Concept</h1>
            <p class="rh-column-links-tekst">
                In dit proof of concept is het mogelijk om als burger ons platform te ervaren. U kunt zich
                <a href="<?php echo URLROOT; ?>/customers/register">registreren</a> en <a href="<?php echo URLROOT; ?>/customers/login">inloggen</a> als burger,
                maar er kan ook ingelogd worden op het (bestaande) test account van Peter:
                <br><br>
                E-mail adres: <strong>peterdevries@hotmail.com</strong><br>
                Wachtwoord: <strong>wachtwoord123</strong><br><br>

                Bekijk het besteloverzicht of plaats een bestelling bij een van onze boeren. Om van start te gaan dient eerst de database aangemaakt
                te worden. Klik daarvoor op onderstaande knop en ervaar het gemak van Boer naar Burger!<br><br>
                <i>Knop werkt nog niet ;). Voor nu gewoon het create database script even runnen in phpmyadmin. Vind je in de <strong>database</strong> map (root).</i>
            </p>
            <button class="btn btn-green px-5">Maak Database</button>
        </div>
    </div>

    <div class="welcome-images mt-3">
        <img src="../img/graan.png" class="rh-scaleImage" alt="Graan">
        <img src="../img/koe.png" class="rh-scaleImage" alt="Koe">
        <img src="../img/sla.png" class="rh-scaleImage" alt="Sla">
    </div>
</div>
<?php include APPROOT."/Views/Includes/footer.php"; ?>
