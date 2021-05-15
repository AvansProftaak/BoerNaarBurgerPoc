<?php include APPROOT."/Views/Includes/header.php"; ?>
<div class="lh-main">
    <div class="lh-row">
        <h2 class="lh-subtitel"><?php echo $lang['about_title']; ?></h2>
        <br />
        <hr class="lh-hr" />
        <div class="lh-paginatekst">
            <p><?php echo $lang['intro_text']; ?></p>

            <div class="images-middle">

                <img src="../img/graan.png" class="lh-centerimgs" alt="Graan" />
                <img src="../img/koe.png" class="lh-centerimgs" alt="Koe" />
                <img src="../img/sla.png" class="lh-centerimgs" alt="Sla" />

            </div>

            <p><?php echo $lang['intro_text2']; ?><a href="<?php echo URLROOT; ?>/customers/register"><?php echo $lang['signup_button']; ?></a>
                <?php echo $lang['intro_text3']; ?>
            </p>
        </div>

        <div class="lh-textcolumn">
            <h2><?php echo $lang['concept']; ?></h2>
            <p><?php echo $lang['concept_text']; ?>
                <br />
                <br />
            <h3><?php echo $lang['we_help']; ?></h3>
            <p><?php echo $lang['help_text']; ?></p>
            <a href="<?php echo URLROOT; ?>/shopowners/register"><button class="lh-button"><?php echo $lang['signup_farm']; ?></button></a>
        </div>

        <div class="lh-textcolumn">
            <h2><?php echo $lang['mission']; ?></h2>
            <p><?php echo $lang['mission_text']; ?></p>

            <img src="../img/apples.png" class="lh-appels" alt="Appels" />

        </div>

        <div class="lh-textcolumn">
            <h2><?php echo $lang['vision']; ?></h2>
            <p><?php echo $lang['vision_text']; ?><br />

            <h3><?php echo $lang['no_waste']; ?></h3>
            <p><?php echo $lang['no_waste_text']; ?></p>
        </div>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footer.php"; ?>
