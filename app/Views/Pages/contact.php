<?php include APPROOT."/Views/Includes/header.php";

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">

</head>
<body>

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
            <form action="<?php echo URLROOT; ?>/pages/contact" method="post">

                <h3 class="title-c">Stuur ons een bericht</h3>
                <div class="input-container">
                    <input type="text" placeholder="Naam" name="name" class="input-c" value="<?php if (isset($_POST["name"])) echo $_POST["name"]; ?>">
                    <span class="form-error"><?php if(isset($data['nameErr'])) echo $data['nameErr'];?></span>
                </div>
                <div class="input-container">
                    <input type="email" placeholder="Emailadres" name="email" class="input-c" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>">
                    <span class="form-error"> <?php if(isset($data['emailErr'])) echo $data['emailErr'];?></span>
                </div>

                <div class="input-container textarea">
                    <textarea name="message" rows="4" cols="50" placeholder="Bericht" class="input-c" <?php if (isset($_POST["=message"]))echo $_POST["=message"]; ?>"></textarea>
                    <span class="form-error"><?php if(isset($data['messageErr'])) echo $data['messageErr'];?></span>
                </div>
                <input type="submit" name="send-contact" value="Verzenden" class="btn-c">
            </form>

        </div>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footer.php"; ?>
