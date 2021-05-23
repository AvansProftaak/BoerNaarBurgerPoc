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
            <h3 class="title"><?php echo $lang['contact_header']; ?></h3>
            <p class="text-c">
                <?php echo $lang['contact_txt']; ?>
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
                    <p>+31 (0)76 123 45 678</p>
                </div>
            </div>

            <div class="social-media">
                <p><?php echo $lang['contact_socials']; ?></p>
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

                <h3 class="title-c"><?php echo $lang['contact_header2']; ?></h3>
                <div class="input-container">
                    <input type="text" placeholder="<?php if($_SESSION['lang'] == 'nl') : ?>naam <?php else : ?>name<?php endif; ?>"
                           name="name" class="input-c" value="<?php if (isset($_SESSION['customer_number']))  echo $_SESSION['customer_name'];
                    else if (isset($_POST["name"])) echo $_POST["name"]; ?>">
                    <span class="form-error"><?php if(isset($data['nameErr'])) echo $data['nameErr'];?></span>
                </div>
                <div class="input-container">
                    <input type="email" placeholder="<?php if($_SESSION['lang'] == 'nl') : ?>email@voorbeeld.nl <?php else : ?>email@example.com<?php endif; ?>"
                           name="emailFrom" class="input-c" value="<?php if (isset($_SESSION['customer_number']))  echo $_SESSION['email'];
                    else if (isset($_POST["emailFrom"])) echo $_POST["emailFrom"]; ?>">
                     <span class="form-error"> <?php if(isset($data['emailErr'])) echo $data['emailErr'];?></span>
                </div>
                <div class="input-container">
                    <input type="text" placeholder="<?php if($_SESSION['lang'] == 'nl') : ?>onderwerp <?php else : ?>subject<?php endif; ?>"
                           name="onderwerp" class="input-c" value="<?php if (isset($_POST["onderwerp"])) echo $_POST["onderwerp"]; ?>">
                    <span class="form-error"> <?php if(isset($data['onderwerpErr'])) echo $data['onderwerpErr'];?></span>
                </div>

                <div class="input-container textarea">
                    <textarea name="message" rows="4" cols="50" placeholder="<?php if($_SESSION['lang'] == 'nl') : ?>bericht <?php else : ?>message<?php endif; ?>"
                              class="input-c"> <?php if (isset($_POST["message"])) echo $_POST["message"]; ?></textarea>
                    <span class="form-error"><?php if(isset($data['messageErr'])) echo $data['messageErr'];?></span>
                </div>
                <input type="submit" name="send-contact" value="<?php echo $lang['contact_button']; ?>" class="btn-c">
            </form>
        </div>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footer.php"; ?>
