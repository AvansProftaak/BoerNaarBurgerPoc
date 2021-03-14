<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="lh-subtitel pt-4">Overzicht bestellingen</h2>
            <?php if(!$data['orders']) :?>
            <div class="col-md-12">
                <div class="pt-5">
                    <p class="text-md-center rh-column-links-tekst">Er zijn nog geen bestellingen geplaatst!<br>
                        Bezoek de <a href="<?php echo URLROOT; ?>/shops/overview">shops</a> van onze boeren en ontdek wat Boer naar Burger jou te bieden heeft!</p>
                    <div class="pt-3 d-flex justify-content-center">
                        <a class="center btn btn-green px-5" href="<?php echo URLROOT; ?>/shops/overview">Ga naar de shops</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php foreach($data['orders'] as $order): ?>
            <!-- Bestelling -->
            <div class="col-md-12">
                <div class="pt-5">
                    <h3 class="shop-products p-2">Bestelling <?php echo $order->order_number ?>
                        <a data-toggle="collapse" href="#order-id<?php echo $order->order_number ?>" role="button" aria-expanded="true" aria-controls="order-id<?php echo $order->order_number ?>">
                            <i class="fa fa-chevron-up chevron-category float-right px-2"></i>
                            <i class="fa fa-chevron-down chevron-category float-right px-2"></i>
                        </a></h3>
                </div>
                <div id="order-id<?php echo $order->order_number ?>" class="collapsed">
                    <div class="row">
                        <div class="col">
                            <h4 class="pt-2 font-weight-bold">Producten</h4>
                            <div class="border-shop">
                                <div class="border-shop"></div>
                                <?php $items = $this->orderModel->getOrderDetails($order);
                                foreach($items as $item) : ?>
                                <div class="pt-2 d-flex justify-content-between align-items-baseline border-shop">
                                    <p class="mb-2"><?php echo $item->amount ?>x</p>
                                    <p class="mb-2"><?php echo $item->product ?> <strong>(<?php echo $item->shop ?>)</strong></p>
                                    <p class="mb-2">€<?php echo $item->price ?></p>
                                </div>
                                <?php endforeach; ?>
                                <div class="pt-2 d-flex justify-content-between align-items-baseline">
                                    <p class="mb-2 font-weight-bold">Totaal:</p>
                                    <p class="mb-2 font-weight-bold">€<?php echo $order->orderamount_incl_tax ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="pt-2 font-weight-bold">Bestelinformatie</h4>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0">Klantnummer:</p>
                                <p class="p-0 m-0"><?php echo $order->customer_number ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0">Bestelnummer:</p>
                                <p class="p-0 m-0"><?php echo $order->order_number ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0">Besteldatum:</p>
                                <p class="p-0 m-0"><?php echo $order->completed_at ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0">Status:</p>
                                <p class="p-0 m-0"><?php echo $order->status ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Einde Bestelling -->
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
