<?php include APPROOT."/Views/Includes/header.php";?>
    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8">

    </head>
<body>
    <div class="rh-main">

        <div class="sitemap">
            <h2>Sitemap</h2>
            <p>
                <h3><a href="<?php echo URLROOT; ?>/pages/index">Home</a></h3>
<br>
                <h3><?php echo $lang['Sitemap_info_burger']; ?></h3>
                    <li><a href="<?php echo URLROOT; ?>/customers/register"><?php echo $lang['Sitemap_registreer_burger']; ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/customers/login"><?php echo $lang['Sitemap_login_burger']; ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/customers/accountdetails"><?php echo $lang['Sitemap_details_burger']; ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/customers/orderoverview"><?php echo $lang['Sitemap_orders_burger']; ?></a></li>
<br>
            <h3><?php echo $lang['Sitemap_info_boer']; ?></h3>
                    <li><a href="<?php echo URLROOT; ?>/shopowners/register"><?php echo $lang['Sitemap_register_boer']; ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/shopowners/login"><?php echo $lang['Sitemap_login_boer']; ?></a></li>
                    <li><a href="<?php echo URLROOT; ?>/shopowners/myshop"><?php echo $lang['Sitemap_shop_boer']; ?></a></li>
            <br>
            <h3><a href="<?php echo URLROOT; ?>/shops/shopdistrict">Shops</a></h3>
            <br>
                <h3><a href="<?php echo URLROOT; ?>/pages/about"><?php echo $lang['Sitemap_about']; ?></a></h3>
            <br>
                <h3><a href="<?php echo URLROOT; ?>/pages/contact"><?php echo $lang['Sitemap_contact']; ?></a></h3>
                    <li><a href="<?php echo URLROOT; ?>/pages/faq"><?php echo $lang['faq']; ?></a></li>

            </p>
        </div>
     
    </div>
</body>
<?php include APPROOT."/Views/Includes/footer.php"; ?>