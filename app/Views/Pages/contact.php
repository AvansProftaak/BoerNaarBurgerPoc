<?php include APPROOT."/Views/Includes/header.php"; ?>
<div class="container-c">
    <span class="big-circle"></span>
    <img src="../img/shape.png" class="square" alt="">
    <div class="form-c">
        <div class="contact-info">
            <h3 class="title">Contact is zo gelegd</h3>
            <p class="text-c">
                Uw persoonsgegevens worden alleen gebruikt waarvoor u ze hebt achtergelaten.
            </p>

            <div class="info">
                <div class="information">
                    <img src="../img/location.png" class="icon-c" alt="">
                    <p>Burgerkinglaan 232, Breda</p>
                </div>

                <div class="information">
                    <img src="../img/email.png" class="icon-c" alt="">
                    <a href="mailto:info@boernaarburger.ml">info@boernaarburger.ml</a>

                </div>

                <div class="information">
                    <img src="../img/phone.png" class="icon-c" alt="">
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
            <span class="circle one"></span>
            <span class="circle two"></span>

            <form action="#">
                <h3 class="title-c">Contact ons</h3>
                <div class="input-container">
                    <input type="text" name="name" class="input-c">
                    <label>Naam</label>
                    <span>Naam</span>
                </div>

                <div class="input-container">
                    <input type="email" name="email" class="input-c">
                    <label>Email</label>
                    <span>Email</span>
                </div>

                <div class="input-container">
                    <input type="tel" name="phone" class="input-c">
                    <label>Telefoonnummer</label>
                    <span>Telefoonnummer</span>
                </div>

                <div class="input-container textarea">
                    <textarea name="message" class="input-c"></textarea>
                    <label>Bericht</label>
                    <span>Bericht</span>
                </div>
                <input type="submit" value="Verzenden" class="btn-c">
            </form>
        </div>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footer.php"; ?>
