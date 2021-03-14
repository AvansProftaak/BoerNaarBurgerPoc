<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div>
        <h1 class="shop-title p-2"><?php echo $data['shop']->shop_name ?></h1>
    </div>
    <div>
        <img src="../img<?php echo $data['shop']->banner_url ?>" class="w-100 py-2" alt="shop image"/>
    </div>
    <div class="pt-4">
        <p><?php echo $data['shop']->description ?></p>
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
                <p><?php echo $product->name ?>
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
        <p><?php echo $product->description ?></p>
    </div>
    <!-- Einde Product -->
    <?php endforeach; ?>

    <div class="d-flex justify-content-between pt-4">
        <h3 class="font-weight-bolder">Bedrag</h3>
        <h3 class="font-weight-bolder">€<span id="totalAmount">0.00</span></h3>
    </div>
    <div class="text-right pt-4 pb-lg-5">
        <button type="submit" onclick="window.location='<?php echo URLROOT . '/shops/step2?shop=' . $data['shop']->shop_number?>'" class="btn btn-green btn-padding">Verder</button>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
