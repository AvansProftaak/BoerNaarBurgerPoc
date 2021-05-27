<?php
    include APPROOT."/Views/Includes/header.php";
    require_once '../app/Helpers/language_helper.php';
?>

<h1> Hier komt een selectie met shops uit het geselecteerde gebied </h1>
<h3>Rob vd Horst</h3>


<div class="container pt-4">
    <div class="row justify-content-center">

        <?php foreach($data['shops'] as $shop): ?>
        <!-- shop card -->
        <div class="p-2">
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green">Ga naar de shop</a>
                </div>
            </div>
        </div>
        <!-- end shop card -->
        <?php endforeach; ?>

    </div>
</div>





<?php require_once APPROOT."/Views/Includes/footer.php";?>
