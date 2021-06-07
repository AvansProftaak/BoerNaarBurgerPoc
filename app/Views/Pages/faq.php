<?php include APPROOT."/Views/Includes/header.php"; ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="../js/pram-faq.js" defer></script>
</head>
<body>
<div class="container">
    <h2 class="faq-h2"><?php echo $lang['veelgestelde_vragen']; ?></h2>
    <div class="accordion">
        <div class="icon"></div>
        <h5><?php echo $lang['wie_zijn_wij']; ?></h5>
    </div>
    <div class="panel">
        <p><?php echo $lang['wie_zijn_wij_answer']; ?></p>
    </div>

    <div class="accordion">
        <div class="icon"></div>
        <h5><?php echo $lang['klacht_melden']; ?></h5>
    </div>
    <div class="panel">
        <p><?php echo $lang['klacht_melden_answer']; ?></p>
    </div>

    <h2 class="faq-h2"><?php echo $lang['betalingen']; ?></h2>
    <div class="accordion">
        <div class="icon"></div>
        <h5><?php echo $lang['inc_BTW']; ?></h5>
    </div>
    <div class="panel">
        <p><?php echo $lang['inc_BTW_answer']; ?></p>
    </div>

    <div class="accordion">
        <div class="icon"></div>
        <h5><?php echo $lang['bestelling_geplaatst']; ?></h5>
    </div>
    <div class="panel">
        <p><?php echo $lang['bestelling_answer']; ?></p>
    </div>

    <div class="accordion">
        <div class="icon"></div>
        <h5><?php echo $lang['kortingscode']; ?></h5>
    </div>
    <div class="panel">
        <p><?php echo $lang['kortingscode_answer']; ?></p>
    </div>

    <div class="accordion">
        <div class="icon"></div>
        <h5><?php echo $lang['bestelling_betalen']; ?></h5>
    </div>
    <div class="panel">
        <p><?php echo $lang['betalen_answer']; ?></p>
    </div>

    <h2 class="faq-h2">Account</h2>
    <div class="accordion">
        <div class="icon"></div>
        <h5><?php echo $lang['wachtwoord_vergeten']; ?></h5>
    </div>
    <div class="panel">
        <p><?php echo $lang['wachtwoord_answer']; ?></p>
    </div>
</div>
</body>

<?php include APPROOT."/Views/Includes/footer.php"; ?>
