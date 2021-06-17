<?php
    include APPROOT."/Views/Includes/header.php";
    require_once '../app/Helpers/language_helper.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="rh-main">
        <div class="rh-centerBuiten">
            <img src="../img/graan.png" class="rh-scaleImage" alt="Graan">
            <img src="../img/koe.png" class="rh-scaleImage" alt="Koe">
            <img src="../img/sla.png" class="rh-scaleImage" alt="Sla">
        </div>
        <div class="rh-centerBuiten">
            <img class="logoBnB" src="../img/logo Boer naar burger_liggend_color.png" alt="Logo">
        </div>
        <div class="rh-row">
            <div class="rh-column-links">
                <p id="rh-column-links-header"><?php echo $lang['welcome']; ?></p> 
                <p id="rh-column-links-tekst"><?php echo $lang['index_text']; ?></p>

                <!-- Create database button -->
                <form method="POST" action="<?php echo URLROOT; ?>/pages/index">
                    <div id="loading-spinner" class="spinner-border" role="status" style="display: none;">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <?php if (isset($_GET['success'])) : ?>
                        <div class="form-group row mx-1 mb-0">
                            <span class="pl-3 text-success user-data-header mr-5"><?php echo $lang['database_created']; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['failed'])) : ?>
                        <div class="form-group row mx-1 mb-0">
                            <span class="pl-3 text-danger user-data-header mr-5"><?php echo $lang['database_failed']; ?></span>
                        </div>
                    <?php endif; ?>
                    <button id="create-db-button" class="lh-button" type="submit" onclick="buttonClicked()"
                            name="createDatabase"><?php echo $lang['createDatabase']; ?></button>
                </form>

                <hr class="columnLijn" style="margin-top: 50px">
                <div class="container" style="width: 100%">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                            <li data-target="#myCarousel" data-slide-to="7"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div style="background-color: transparent" class="carousel-item active";>
                                <q><?php echo $lang['caroussel-1']; ?></q>
                                <p>DANIËL JANSEN</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>
                            </div>                           
                            <div style="background-color: transparent" class="carousel-item">
                                <q><?php echo $lang['caroussel-2']; ?></q>
                                <p>SARA DARWISH</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>
                            </div>
                            <div style="background-color: transparent" class="carousel-item">
                                <q><?php echo $lang['caroussel-3']; ?></q>
                                <p>ROB VAN DER HORST</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>
                            </div>
                            <div style="background-color: transparent" class="carousel-item">
                                <q><?php echo $lang['caroussel-4']; ?></q>
                                <p>JORIS JANSEN</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>
                            </div>
                            <div style="background-color: transparent" class="carousel-item">
                                <q><?php echo $lang['caroussel-5']; ?></q>
                                <p>PRAM GODAKANDA</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>
                            </div>
                            <div style="background-color: transparent" class="carousel-item">
                                <q><?php echo $lang['caroussel-6']; ?></q>
                                <p>LARS HANEGRAAF</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>
                            </div>
                            <div style="background-color: transparent" class="carousel-item">
                                <q><?php echo $lang['caroussel-7']; ?></q>
                                <p>MOHAMMED ABOUSHIHAB</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>                   
                            </div>
                            <div style="background-color: transparent" class="carousel-item">
                                <q><?php echo $lang['caroussel-8']; ?></q>
                                <p>BART GROOTOONK</p>
                                <div id="rh-sterren">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                    <img id="rh-ster" src="../img/icon/ster.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="columnLijn">
            </div>
            <div class="rh-column-rechts">
                <h2 class="hoewerkthet"><?php echo $lang['how_it_works']; ?></h2>
                <div class="rh-rij-container">
                    <div class="rh-rij-text1">
                        <p class="rh-titel-column"><?php echo $lang['sign_in_index']; ?></p>
                        <hr class="rh-hr-column">
                        <img class="rh-column-gif" src="../img/aanmeldknop_boer.gif">
                        <p class="rh-text-column"><?php echo $lang['stop_foodwaste']; ?></p>
                        <button onclick="document.location='<?php echo URLROOT; ?>/customers/register'" id="rh-columnButton"><?php echo $lang['signup_button']; ?></button>
                    </div>
                    <div class="rh-rij-text2">
                        <p class="rh-titel-column"><?php echo $lang['find_your_farmer']; ?></p>
                        <hr class="rh-hr-column">
                        <a href="<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksAll=a_valuey"><img class="rh-column-map" src="../img/kaart nederland.png"></a>
                        <p class="rh-text-column"><?php echo $lang['find_a_farmer']; ?></p>
                    </div>
                    <div class="rh-rij-text3">
                        <p class="rh-titel-column"><?php echo $lang['do_groceries']; ?></p>
                        <hr class="rh-hr-column">
                        <img class="rh-column-img" src="../img/shopping_cart.png">
                        <p class="rh-text-column"><?php echo $lang['order_groceries']; ?></p>
                        <a href="https://www.paypal.com/" target="_blank" >
                            <img src="../img/icon/Paypal-39_icon.png" alt="Paypal betaling geaccepteerd"  class="rh-column-logos">
                        </a>&nbsp;
                        <a href="https://www.apple.com/nl/apple-pay/" target="_blank">
                            <img src="../img/icon/apple_pay_logo_icon.png" alt="Apple Pay geaccepteerd" class="rh-column-logos">
                        </a>&nbsp;
                        <a href="https://www.ideal.nl/" target="_blank" >
                            <img src="../img/icon/ideal.png" alt="iDeal betaling geaccepteerd" class="rh-column-logos">
                        </a>&nbsp;
                        <a href="https://www.mastercard.nl/nl-nl/consumers.html" target="_blank" >
                            <img src="../img/icon/Mastercard.png" alt="Visa betaling geaccepteerd" class="rh-column-logos">
                        </a>&nbsp;
                        <a href="https://www.worldcard.nl/" target="_blank" >
                            <img src="../img/icon/visa.png" alt="Visa betaling geaccepteerd" class="rh-column-logos">
                        </a>
                    </div>
                    <div class="rh-rij-text4">
                        <p class="rh-titel-column"><?php echo $lang['pick_up_QR']; ?></p>
                        <hr class="rh-hr-column">
                        <img class="rh-column-qr" src="../img/qr-code.png" alt="QR-code naar Boer naar Burger">
                        <p class="rh-text-column"><?php echo $lang['scan_and_pick']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>


<?php include APPROOT."/Views/Includes/footer.php"; ?>
