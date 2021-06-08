

<footer id="footer" style='background-color: #005622'>

    <div>
        <img class="footerimage" src="../img/footer_b2b.jpg">
    </div>
        <div class="container-fluid footer">
            <div class="row mb-3" >
                <div class="px-5 mx-5 col footer-content">
                    <h2 class="h2-footer"><?php echo $lang['about_us']; ?></h2>
                    <div>
                        <p>
                            <?php echo $lang['footer_text']; ?>
                        </p>
                        <div class="social">
                            <a href="https://facebook.com/" target="_blank"><span class="a-footer a-icons p-2 fab fa-facebook-f"></span></a>
                            <a href="https://instagram.com" target="_blank"><span class="a-footer a-icons p-2 fab fa-instagram"></span></a>
                            <a href="https://twitter.com" target="_blank"><span class="a-footer a-icons p-2 fab fa-twitter"></span></a>
                            <a href="https://linkedin.com" target="_blank"><span class="a-footer a-icons p-2 fab fa-linkedin"></span></a>
                        </div>
                    </div>
                </div>
                <div class="px-5 mx-5 col footer-content larger-font">
                    <img src="../img/logo Boer naar burger_liggend_wit_color.png" width=100%>
                    <div>
                        <div class="place">
                            <span class="fas fa-map-marker-alt"></span>
                            <span class="text"><?php echo $lang['bnb_address']; ?></span>
                        </div>
                        <div class="phone">
                            <span class="fas fa-phone-alt"></span>
                            <span class="text"><?php echo $lang['bnb_phone']; ?></span>
                        </div>
                        <div class="email">
                            <span class="fas fa-envelope"></span>
                            <span class="mail"><a href="mailto:info@boernaarburger.ml" class="a-footer"><?php echo $lang['bnb_email']; ?></a></span>
                        </div>
                    </div>
                </div>
                <div class="px-5 pt-3 mx-5 col footer-content">
                    <div>
                        <h2 class="h2-footer"><?php echo $lang['service']; ?></h2>
                        <li><a href="<?php echo URLROOT; ?>/pages/sitemap" class="a-footer"><?php echo $lang['sitemap']; ?></a></li>
                        <li><a href="<?php echo URLROOT; ?>/pages/faq" class="a-footer"><?php echo $lang['faq']; ?></a></li>
                        <li><a href="<?php echo URLROOT; ?>/pages/contact" class="a-footer"><?php echo $lang['contact2']; ?></a></li>
                        <li><a href="<?php echo URLROOT; ?>/admins/login" class="a-footer">Login Admin</a></li>
                        <br/>
                        <a href="<?php echo URLROOT; ?>/shopowners/register" class="btn btn-pink">
                            <?php echo $lang['signup']; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <div class="footer-copyright"><?php echo $lang['copyright']; ?></div>

</footer>

<!-- einde div rh-flex-wrapper om footer onderaan de site te pushen-->
</div>

</body>

</html>



