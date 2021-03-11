<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div class="pt-4">
        <h3 class="font-weight-bolder">Overzicht bestelling bij <strong>Aardbeien van René</strong></h3>
    </div>

    <hr class="shop-border m-0 order-overview-width">

    <div class="pt-2 border-shop order-overview-width">
        <div class="d-flex justify-content-between align-items-baseline border-shop">
            <p class="mb-2">2x</p>
            <p class="mb-2">Lambada Aardbeien 250gram</p>
            <p class="mb-2">€6.98</p>
        </div>
        <div class="pt-2 d-flex justify-content-between align-items-baseline border-shop">
            <p class="mb-2">1x</p>
            <p class="mb-2">Lambada Aardbeien XXL (1 kilo)</p>
            <p class="mb-2">€14.00</p>
        </div>
        <div class="pt-2 d-flex justify-content-between align-items-baseline">
            <p class="mb-2 font-weight-bold">Totaal:</p>
            <p class="mb-2 font-weight-bold">€20.98</p>
        </div>
    </div>

    <div class="pt-4">
        <h3 class="font-weight-bolder">Uw gegevens</h3>
    </div>

    <div class="pt-2">
        <form action="#" method="POST">
            <div class="form-group row">
                <!-- First Name -->
                <div class="col-5">
                    <label for="first_name" class="pl-2 user-data-header">Voornaam</label>
                    <input id="first_name" type="text" class="form-control rounded-borders shop-form-background" placeholder="Voornaam" name="first_name" required autocomplete="fname">
                </div>
                <!-- Last Name -->
                <div class="col">
                    <label for="last_name" class="pl-2 user-data-header">Achternaam</label>
                    <input id="last_name" type="text" class="form-control rounded-borders shop-form-background" placeholder="Achternaam" name="last_name" required autocomplete="lname">
                </div>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <p class="user-data-header ml-2 mb-0">Geslacht</p>
                <div class="d-flex row">
                    <div class="form-check px-4 ml-3">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">
                            Man
                        </label>
                    </div>
                    <div class="form-check px-4">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                            Vrouw
                        </label>
                    </div>
                    <div class="form-check px-4">
                        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                        <label class="form-check-label" for="other">
                            Anders
                        </label>
                    </div>
                </div>
            </div>

            <!-- E-mail Address -->
            <div class="form-group row px-0">
                <div class="col">
                    <label for="email" class="pl-2 user-data-header">E-Mailadres</label>
                    <input id="email" type="email" class="form-control rounded-borders shop-form-background" name="email" placeholder="E-Mailadres" required autocomplete="email">
                </div>
            </div>

            <div class="form-group row mx-1">
                <!-- Street -->
                <div class="col-8 px-0">
                    <label for="street" class="pl-2 user-data-header">Straat</label>
                    <input id="street" type="text" class="form-control rounded-borders shop-form-background" placeholder="Straat" name="street" required autocomplete="street">
                </div>
                <!-- Housenumber -->
                <div class="col-4 pl-4 pr-0">
                    <label for="house_number" class="pl-2 user-data-header">Huisnummer</label>
                    <input id="house_number" type="text" class="form-control rounded-borders shop-form-background" placeholder="Huisnummer" name="house_number" required autocomplete="housenumber">
                </div>
            </div>

            <div class="form-group row mx-1">
                <!-- Zipcode -->
                <div class="col px-0">
                    <label for="zipcode" class="pl-2 user-data-header">Postcode</label>
                    <input id="zipcode" type="text" class="form-control rounded-borders shop-form-background" placeholder="Postcode" name="zipcode" required autocomplete="zipcode">
                </div>
                <!-- City -->
                <div class="col pl-4 pr-0">
                    <label for="city" class="pl-2 user-data-header">Stad</label>
                    <input id="city" type="text" class="form-control rounded-borders shop-form-background" placeholder="Stad" name="city" required autocomplete="city">
                </div>
            </div>

            <div class="pt-4">
                <h3 class="shop-products p-2">Account registeren (optioneel)
                    <a data-toggle="collapse" href="#shop-register" role="button" aria-expanded="true" aria-controls="shop-register">
                        <i class="fa fa-chevron-up chevron-category float-right px-2"></i>
                        <i class="fa fa-chevron-down chevron-category float-right px-2"></i>
                    </a></h3>
            </div>

            <div id="shop-register" class="collapsed">
                <p>Vul een wachtwoord in om een account aan te maken.</p>
                <div class="form-group row mx-1">
                    <div class="col px-0">
                        <label for="password" class="pl-2 user-data-header">Wachtwoord</label>
                        <input id="password" type="password" class="form-control rounded-borders shop-form-background" name="password" required autocomplete="new-password">
                    </div>

                    <div class="col pl-4 pr-0">
                        <label for="password-confirm" class="pl-2 user-data-header">Bevestig wachtwoord</label>
                        <input id="password-confirm" type="password" class="form-control rounded-borders shop-form-background" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
            </div>

            <!-- select payment method -->
            <div class="form-group row mx-1 pt-4">
                <label for="payment-method" class="pl-2 user-data-header">Selecteer Betaalmethode</label>
                <select class="form-control rounded-borders shop-form-background">
                    <option>iDEAL</option>
                    <option>Mastercard</option>
                    <option>Visa Card</option>
                    <option>PayPal</option>
                </select>
            </div>

            <!-- privacy policy agreement -->
            <div class="form-group row mx-1 pt-2">
                <div class="col align-items-baseline px-0">
                    <div class="form-check">
                        <input class="form-check-input mt-2" type="checkbox" name="has_accepted_terms" id="has_accepted_terms">
                        <label class="pl-2 user-data-header" for="has_accepted_terms">
                            Ik ga akkoord met de <a href="#">gebruikersvoorwaarden</a> en het <a href="#">privacybeleid</a> van Boer naar Burger
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-4 pb-lg-5 d-flex justify-content-between">
                <button type="submit" onclick="window.location='<?php echo URLROOT; ?>/shops/step1'" class="btn btn-green btn-padding">Terug</button>
                <button type="submit" onclick="window.location='<?php echo URLROOT; ?>/shops/step3'" class="btn btn-green btn-padding">Betalen</button>
            </div>
        </form>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
