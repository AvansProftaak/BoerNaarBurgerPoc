<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welkom bij Boer naar Burger. De website waar je (h)eerlijke boerenproducten kunt kopen welke de boer niet verkocht krijgt. Stop voedselverspilling en red de planeet!">
    <meta name="keywords" content="Boer, Burger, Voedselverspilling, voedsel, verspilling, eten, duurzaamheid">
    <meta name="author" content="groep 4A - Deeltijdopleiding Informatica aan Avans Hogeschool Breda">

    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/libhanddis" type="text/css"/>
    <link href='https://fonts.googleapis.com/css2?family=Dosis&family=Montserrat:wght@400&family=Amatic+SC&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cormorant SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/nazi-typewriter" type="text/css"/> 

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" type="text/css" href="css/styleRob.css">
    <link rel="stylesheet" type="text/css" href="css/styleFooter.css">
    <link rel="stylesheet" type="text/css" href="css/styleNavbar.css">
    <link rel ="icon" href = 'img/icon/favicon.ico' type = "image/favicon"> 
    
    <title>Home | Boer naar Burger</title>
</head>

<body> 
    <div class="rh-flex-wrapper">
            <div class="navigatiebar">
                <a href="index.php">
                    <img id="rh-titel-logo" src="img/logo Boer naar burger_liggend_wit_color.png">
                </a>
                <div class="dropdown">
                    <div class="dropdown">
                        <button onclick="document.location='index.php'" class="dropButton"><a href="index.php" class="noHover geselecteerdePagina">HOME</a></button>
                    </div>
                </div>
                    <div class="dropdown">
                        <button onclick="dropdownAanmelden()" class="dropButton">AANMELDEN</button>
                            <div id="Drop-Aanmelden" class="dropdown-content">
                                <a href="login_boer.php">Aanmelden BOER</a>
                                <a href='login_burger.php'>Aanmelden BURGER</a>  
                            </div>
                    </div>
                <div class="dropdown">
                    <button onclick="document.location='about.php'" class="dropButton"><a href="about.php" class="noHover">WIE ZIJN WIJ</a></button>
                </div>      
                <div class="dropdown">
                    <button onclick="dropdownContact()" class="dropButton">CONTACT</button>
                        <div id="Drop-Contact" class="dropdown-content">
                            <a href="contact.php">Contactgegevens</a>
                            <a href="faq.php" id="bottomNavbar">Veelgestelde vragen</a>
                        </div>
                </div>
            </div>

        <div class="rh-main">
            <div class="rh-centerBuiten">
                <img src="img/graan.png" class="rh-scaleImage" alt="Graan">
                <img src="img/koe.png" class="rh-scaleImage" alt="Koe">
                <img src="img/sla.png" class="rh-scaleImage" alt="Sla">
            </div>
            <div class="rh-centerBuiten">
            <img class="logoBnB" src="img/logo Boer naar burger_liggend_color.png" alt="Sla">
            </div>
            <div class="rh-row">
                <div class="rh-column-links">
                    <p id="rh-column-links-header">Welkom bij Boer naar Burger</p> 
                    <p id="rh-column-links-tekst">
                        Wij bieden gezond en kwalitatief voedsel voor een (h)eerlijke prijs. Dagvers, rechtstreeks van het land!
                        <br><br> 
                        Tonnen aan vers en heerlijk voedsel worden dagelijks weggegooid; 
                        groenten en fruit die net niet mooi genoeg zijn of overproductie die de boer niet kwijt kan bij de supermarkten. 
                        Wij zeggen: eeuwig zonde! Juist deze producten geven wij een bestemming, want ze zijn immers net zo vers en smakelijk. <br><br>
                        Sluit je aan bij ons initiatief en bespaar tientallen euro's per maand, en 
                        <strong>maak een vuist tegen voedselverspilling!</strong>
                    </p>
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
                                <div style="background-color: transparent" class="item active";>
                                    <q>IK HELP DE BOER EN BEN ZELF GOEDKOPER UIT<br>WIN WIN, ALS JE HET MIJ VRAAGT</q>
                                    <p>DANIËL JANSEN</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>
                                </div>                           
                                <div style="background-color: transparent" class="item">
                                    <q>VEEL LOKALE PRODUCTEN, OOK BIOLOGISCH,<br>
                                        HEERLIJK!</q>
                                    <p>SARA DARWISH</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>
                                </div>
                                <div style="background-color: transparent" class="item">
                                    <q>OP DEZE MANIER DOE IK IETS TERUG<br>
                                        VOOR DE NEDERLANDSE BOER</q>
                                    <p>ROB VAN DER HORST</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>
                                </div>
                                <div style="background-color: transparent" class="item">
                                    <q>MAKKELIJK TE BESTELLEN, SNEL AF TE HALEN <br>
                                        EN ALLES IS VERS EN IN GOEDE STAAT</q>
                                    <p>JORIS JANSEN</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>
                                </div>
                                <div style="background-color: transparent" class="item">
                                    <q>PRIMA PRODUCTEN EN JE PROEFT DUIDELIJK<br>
                                        VERSCHIL MET DE SUPERMARKT</q>
                                    <p>PRAM GODAKANDA</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>
                                </div>
                                <div style="background-color: transparent" class="item">
                                    <q>PURE PRODUCTEN, VERS EN OOK<br>NOG EENS FIJN
                                        VOOR DE BOEREN ZELF</q>
                                    <p>LARS HANEGRAAF</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>
                                </div>
                                <div style="background-color: transparent" class="item">
                                    <q>PRETTIGE WEBSITE, GOED AANBOD<br>
                                        FANTASTISCHE KWALITEIT</q>
                                    <p>MOHAMMED ABOUSHIHAB</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>                   
                                </div>
                                <div style="background-color: transparent" class="item">
                                    <q>ONZE ERVARING IS GOED.<br>
                                        LEKKER EN ONBESPOTEN</q>
                                    <p>BART GROOTOONK</p>
                                    <div id="rh-sterren">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                        <img id="rh-ster" src="img/icon/ster.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="columnLijn">
                </div>
                <div class="rh-column-rechts">
                    <h2 class="hoewerkthet">Hoe werkt het?</h2>
                    <div class="rh-rij-container">

                        <div class="rh-rij-text1">
                            <p class="rh-titel-column">MELD JE AAN</p>
                                <hr class="rh-hr-column">
                                <img class="rh-column-gif" src="img/aanmeldknop_boer.gif">
                            <p class="rh-text-column">Begin meteen met het tegengaan van voedselverspilling</p>
                            <button onclick="document.location='login_boer.php'" id="rh-columnButton">Meld je aan</button>
                        </div>
                        <div class="rh-rij-text2">
                            <p class="rh-titel-column">ZOEK JE BOER</p>
                                <hr class="rh-hr-column">
                                <a href="regio-keus2.php"><img class="rh-column-map" src="img/kaart nederland.png"></a>
                            <p class="rh-text-column">Zoek een boer in jouw omgeving</p>
                        </div>
                        <div class="rh-rij-text3">
                            <p class="rh-titel-column">DOE JE BOODSCHAPPEN</p>
                                <hr class="rh-hr-column">
                            <img class="rh-column-img" src="img/shopping_cart.png">
                            <p class="rh-text-column">Bestel al je boodschappen en reken de ze af vanuit je winkelmandje</p>
                                <a href="https://www.paypal.com/" target="_blank" >
                                    <img src="img/icon/Paypal-39_icon.png" alt="Paypal betaling geaccepteerd"  class="rh-column-logos">
                                </a>
                                <a href="https://www.apple.com/nl/apple-pay/" target="_blank">
                                    <img src="img/icon/apple_pay_logo_icon.png" alt="Apple Pay geaccepteerd" class="rh-column-logos">
                                </a>
                                <a href="https://www.ideal.nl/" target="_blank" >
                                    <img src="img/icon/ideal.png" alt="iDeal betaling geaccepteerd" class="rh-column-logos">
                                </a>
                                <a href="https://www.mastercard.nl/nl-nl/consumers.php" target="_blank" >
                                    <img src="img/icon/Mastercard.png" alt="Visa betaling geaccepteerd" class="rh-column-logos">
                                </a>
                                <a href="https://www.worldcard.nl/" target="_blank" >
                                    <img src="img/icon/visa.png" alt="Visa betaling geaccepteerd" class="rh-column-logos">
                                </a>
                        </div>
                        <div class="rh-rij-text4">
                            <p class="rh-titel-column">HAAL AF MET QR-CODE</p>
                                <hr class="rh-hr-column">
                            <img class="rh-column-qr" src="img/qr-code.png" alt="QR-code naar Boer naar Burger">
                            <p class="rh-text-column">Laat je QR-code scannen door de boer en neem je boodschappen mee naar huis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div style="display: grid">
                <img id="footerWidth" class="footerimage" src="img/footer_b2b.jpg">
                <img id="footerWidth" class="footerimage2" src="img/headerb2b.jpg">
            </div>
            <div class="footer_dj">
                <div class="links box">
                    <h2>Over ons</h2>
                        <div class="content">
                        <p>
                        Boer naar Burger biedt een platform waarop producten aangeboden worden, die in de huidige maatschappij verloren gaan. 
                        Door deze producten te verhandelen helpen wij boeren van hun overproductie af, en ondersteunen wij onze medemens in moeilijkere tijden. 
                        Daarnaast bieden wij consumenten, producten met een verhaal; (h)eerlijk en betrouwbaar. 
                        </p>
                            <div class="social">
                                <a href="https://facebook.com/" target="_blank"><span class="fab fa-facebook-f"></span></a>
                                <a href="https://instagram.com" target="_blank"><span class="fab fa-instagram"></span></a>
                                <a href="https://twitter.com" target="_blank"><span class="fab fa-twitter"></span></a>
                                <a href="https://linkedin.com" target="_blank"><span class="fab fa-linkedin"></span></a>
                            </div>
                        </div>
                </div>
                <div class="midden box">
                    <img src="img/logo Boer naar burger_liggend_wit_color.png" width=100%>
                        <div class="content">
                            <div class="place">
                                <span class="fas fa-map-marker-alt"></span>
                                <span class="text">Burgerkinglaan 232, Breda</span>
                            </div>
                            <div class="phone">
                                <span class="fas fa-phone-alt"></span>
                                <span class="text">+31 (0)76 - 123 456 78</span>
                            </div>
                            <div class="email">
                                <span class="fas fa-envelope"></span>
                                <span class="mail"><a href="mailto:info@boernaarburger.ml">info@boernaarburger.ml</a></span>
                            </div>
                        </div>
                </div>
                <div class="rechts box">
                    <div class="content">
                        <h2>Service</h2>
                        <li><a href=sitemap.php>Sitemap</a> </li>
                        <li><a href=faq.php>Veelgestelde vragen</a></li>
                        <li><a href=contact.php>Contact</a></li>
                        <br/>
                        <button onclick="document.location='login_boer.php'"  id="footer button">Meld je aan als klant en profiteer van extra voordeel!</button>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">© 2020 Copyright: groep 4A - Deeltijdopleiding Informatica aan Avans Hogeschool Breda</div>
        </footer>


<script src="js\Navbar.js" type="text/javascript"></script>

</body>

</html>