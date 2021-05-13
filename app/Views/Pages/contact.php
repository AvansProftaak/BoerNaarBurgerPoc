<?php include APPROOT."/Views/Includes/header.php"; ?>

<?php

// functie die de formuliervelden valideert en foutmeldingen aanmaakt
function validate($name, $email, $phone, $message)
{
    $errors = array();

    // validatie voor naam
    if(empty($name))
        $errors['naam'] = 'U heeft geen naam ingevuld.';

    // validatieregels voor het mailadres
    if(!strlen($email))
        $errors['email'] = 'U heeft geen email adres ingevuld.';
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors['email'] = 'U heeft een ongeldig email adres ingevuld.';

    // validatie voor telefoonnummer
    if(!strlen($phone))
        $errors['phone'] = 'U heeft geen telefoonnummer ingevuld.';

    // validatie voor bericht
    if(empty($message))
        $errors['message'] = 'U heeft geen bericht ingevuld.';

    // geef de array met foutmeldingen terug
    return $errors;
}

// initialisatie // define variables and set to empty values
$name = '';
$email = '';
$phone = '';
$message = '';
$errors = array();

// indien het formulier verstuurd is
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // overschrijf de variabelen met de waarde uit de $_POST array
    $naam = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // valideer de ingevulde gegevens
    $errors = validate($_POST['naam'], $_POST['email'], $_POST['phone'], $_POST['message']);

    // als er geen fouten voortkomen uit de validatie
    if(!count($errors))
    {
        /*
         * Hier formulier nog verwerken, bijvoorbeeld een email versturen of
         * de gegevens opslaan in de database
         */

        // redirect de gebruiker
        header('Location: confirmation.html');
        exit;
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">

</head>
<body>
<?php
if(count($errors)) {
    echo '<ul id="errors">';
    foreach($errors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}
?>


<div class="container-c">
        <div class="form-c">
        <div class="contact-info">
            <h3 class="title">Contact is zo gelegd</h3>
            <p class="text-c">
                Uw persoonsgegevens worden alleen gebruikt waarvoor u ze hebt achtergelaten.
            </p>

            <div class="info">
                <div class="information">
                    <img src="../img/icon/location.png" class="icon-c" alt="">
                    <p>Burgerkinglaan 232, Breda</p>
                </div>

                <div class="information">
                    <img src="../img/icon/email.png" class="icon-c" alt="">
                    <a href="mailto:info@boernaarburger.ml">info@boernaarburger.ml</a>

                </div>

                <div class="information">
                    <img src="../img/icon/phone.png" class="icon-c" alt="">
                    <p>076 123 45 678</p>
                </div>
            </div>

            <div class="social-media">
                <p>Connect met ons</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.twitter.com">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="contact-form">


            <form action="#" method="post">
                <h3 class="title-c">Stuur ons een bericht</h3>
                <div class="input-container">
                    <input type="text" placeholder="Naam" name="name" class="input-c" value="<?php echo $name; ?>">

                </div>

                <div class="input-container">
                    <input type="email" placeholder="Emailadres" name="email" class="input-c" value="<?php echo $email; ?>">
                </div>

                <div class="input-container">
                    <input type="tel" placeholder="Telefoonnummer" name="phone" class="input-c" value="<?php echo $phone; ?>">
                </div>

                <div class="input-container textarea">
                    <textarea name="message" placeholder="Bericht" class="input-c" <?php echo $message; ?>"></textarea>
                </div>
                <input type="submit" value="Verzenden" class="btn-c">
            </form>
        </div>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footer.php"; ?>
