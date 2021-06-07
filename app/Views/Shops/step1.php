<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <?php if (!isLoggedIn()) : ?>
        <div class="col alert-danger font-weight-bold p-4 shop-login-warning"><?php echo $lang['login_mandatory']; ?><br><br>
            <div class="d-flex justify-content-between align-items-baseline">
            <a href="<?php echo URLROOT; ?>/customers/login"><button name="loginButton" class="btn btn-green px-5"><?php echo $lang['login_button']; ?></button></a>
            <a href="<?php echo URLROOT; ?>/customers/register"><button name="registerButton" class="btn btn-green px-5"><?php echo $lang['register_button']; ?></button></a>
            </div>
        </div>

    <?php endif; ?>
    <div>
        <h1 class="shop-title p-2"><?php echo $this->getTranslation($data['shop']->shop_name, $_SESSION['lang']); ?></h1>
    </div>
    <div>
        <img src="../img<?php echo $data['shop']->banner_url ?>" class="w-100 py-2" alt="shop image"/>
    </div>
    <div class="pt-4">
        <p><?php echo $this->getTranslation($data['shop']->description, $_SESSION['lang']); ?></p>
    </div>
    <div class="py-4">
        <h3 class="shop-products p-2">Producten</h3>
    </div>
    <hr class="shop-border m-0">

    <form action="#" method="POST">
        <?php foreach($data['products'] as $product): ?>
        <!-- Start Product -->
        <div class="product pt-3 border-shop">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class ="product-width">
                    <p class="product"><?php echo $this->getTranslation($product->name, $_SESSION['lang']); ?>
                        <a data-toggle="collapse" href="#description<?php echo $product->product_number ?>" role="button" aria-expanded="false" aria-controls="description<?php echo $product->product_number ?>">
                            <i class="pl-2 fa fa-chevron-down"></i>
                            <i class="pl-2 fa fa-chevron-up"></i></a></p>
                </div>
                <div class = "price-width">
                    <p>€<span id="price"><?php echo $product->price ?></span></p>
                </div>
                <div class="d-flex justify-content-center align-items-baseline shop-width">
                    <button type="button" class="btn-decrement">-</button>
                    <label for="quantity"></label>
                    <input type="text" id="quantity" class="product-input px-3" name="product[]" value="0" readonly/>
                    <button type="button" class="btn-increment">+</button>
                </div>
                <div class = "price-width text-right">
                    <p>€<input type="text" class="total total-input" value="0.00" name="totalProduct[]" readonly /></p>
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
            <h3 class="font-weight-bolder">
                €<label for="totalAmount"></label>
                <input type="text" id="totalAmount" value="0.00" readonly name="orderTotal" class="order-total-input"/>
            </h3>
        </div>
        <div class="container">
        <div class="row">
        <div class="col text-left pt-4 pb-lg-5">
            <a class="btn btn-pink btn-padding" href="<?php echo URLROOT; ?>/shops/overview">Terug naar Shops</a>
        </div>
        <div class="col text-right pt-4 pb-lg-5">
            <button type="submit" name="submit" <?php if (!isLoggedIn()) echo 'disabled style="cursor: not-allowed;"'; ?> class="btn btn-green btn-padding">Verder</button>
        </div>
    </form>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
