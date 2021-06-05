
<?php include APPROOT."/Views/Includes/header.php"; ?>
<div class="container pt-4">
<div class="row justify-content-center">
        <div class="col-md-12">
        <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <div>
                            <img src="<?php if($_SESSION['lang'] == 'nl') : ?>../img/noimage.png<?php else : ?>../img/noimageEN.png<?php endif; ?>" alt="Profile Picture" class="rounded-circle w-75 profile-photo"/>
                            <a data-toggle="modal" data-target="#profilePictureModal"><img src ="../img/photo-icon.png" alt="camera-icon" class="photo-icon"></a>
                        </div>
                        <h3 class="white-text p-3"><?php echo $_SESSION['company_name']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['my_shop']; ?></h2>
                    <hr class="mx-2">
    <div>
        <h1 class="shop-title p-2"><?php echo $this->getTranslation($data['shop']->shop_name, $_SESSION['lang']); ?></h1>
    </div>
    <div>
        <img src="../img<?php echo $data['shop']->banner_url ?>" class="w-100 py-2" alt="shop image"/>
    </div>
    </div>
    </div>
    <div class="pt-4">
        <p><?php echo $this->getTranslation($data['shop']->description, $_SESSION['lang']); ?></p>
    </div>
    <div class="py-4">
        <h3 class="shop-products p-2">Producten</h3>
    </div>
    <hr class="shop-border m-0">

    <?php foreach($data['products'] as $product): ?>
    <!-- Start Product -->
    <div class="pt-3 border-shop">
        <div class="d-flex justify-content-between align-items-baseline">
            <div class = "product-width">
                <p><?php echo $this->getTranslation($product->name, $_SESSION['lang']); ?>
                    <a data-toggle="collapse" href="#description<?php echo $product->product_number ?>" role="button" aria-expanded="false" aria-controls="description<?php echo $product->product_number ?>">
                        <i class="pl-2 fa fa-chevron-down"></i>
                        <i class="pl-2 fa fa-chevron-up"></i></a></p>
            </div>
            <div class = "price-width">
                <p>€<span id="price"><?php echo $product->price ?></span></p>
            </div>
            <div class="d-flex justify-content-center align-items-baseline shop-width">
                <button type="button" class="btn-decrement">-</button>
                <p id="count<?php echo $product->product_number ?>" class="px-3">0</p>
                <button type="button" class="btn-increment">+</button>
            </div>
            <div class = "price-width text-right">
                <p>€<span id="total">0.00</span></p>
            </div>
        </div>
    </div>
    <div id="description<?php echo $product->product_number ?>" class="collapse pt-3 border-shop">
        <p><?php echo $this->getTranslation($product->description, $_SESSION['lang']); ?></p>
    </div>
    <!-- Einde Product -->
    <?php endforeach; ?>

    <div class="d-flex justify-content-between pt-4">
        <h3 class="font-weight-bolder">Bedrag</h3>
        <h3 class="font-weight-bolder">€<span id="totalAmount">0.00</span></h3>
    </div>
    <div class="container">
  <div class="row">
  <div class="col text-left pt-4 pb-lg-5">
    <a class="btn btn-pink btn-padding" href="<?php echo URLROOT; ?>/shops/overview">Terug naar Shops</a>
    </div>
    <div class="col text-right pt-4 pb-lg-5">
    <button type="submit" onclick="window.location='<?php echo URLROOT . '/shops/step2?shop=' . $data['shop']->shop_number?>'" class="btn btn-green btn-padding">Verder</button>
    </div>
  </div>
</div>
    <div class="text-right pt-4 pb-lg-5">
        
       
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>3e