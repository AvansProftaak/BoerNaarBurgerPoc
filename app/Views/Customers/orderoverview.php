<?php include APPROOT . "/Views/Includes/header.php"; ?>

<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="lh-subtitel pt-4"><?php echo $lang['order_overview']; ?></h2>

            <!-- searchbar for orders -->
            <div class="container">
                <br/>
	            <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-5">
                        <form class="card card-sm">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-search h4 text-body"></i>
                                </div>
                                <!--end of col-->
                                <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="<?php echo $lang['searchfield']; ?>">
                                </div>
                                <!--end of col-->
                                <div class="col-auto">
                                    <button class="btn btn-lg btn-success" type="submit" style='margin-left: 4px'>Zoek</button>
                                </div>
                                <!--end of col-->
                            </div>
                        </form>
                    </div>
                    <!--end of col-->
                </div>
            </div>

            <?php if(!$data['orders']) :?>
            <div class="col-md-12">
                <div class="pt-5">
                    <p class="text-md-center rh-column-links-tekst"><?php echo $lang['empty_orders']; ?><br>
                        <?php echo $lang['visit_shops']; ?><a href="<?php echo URLROOT; ?>/shops/overview"><?php echo $lang['shops_link']; ?></a><?php echo $lang['visit_shops2']; ?></p>
                    <div class="pt-3 d-flex justify-content-center">
                        <a class="center btn btn-green px-5" href="<?php echo URLROOT; ?>/shops/overview"><?php echo $lang['go_shops']; ?></a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php foreach($data['orders'] as $order): ?>
            <!-- Bestelling -->
            <div class="col-md-12">
                <div class="pt-5">
                    <h3 class="shop-products p-2"><?php echo $lang['order'] . ' ' . $order->order_number ?>
                        <a data-toggle="collapse" href="#order-id<?php echo $order->order_number ?>" role="button" aria-expanded="true" aria-controls="order-id<?php echo $order->order_number ?>">
                            <i class="fa fa-chevron-up chevron-category float-right px-2"></i>
                            <i class="fa fa-chevron-down chevron-category float-right px-2"></i>
                        </a></h3>
                </div>
                <div id="order-id<?php echo $order->order_number ?>" class="collapsed">
                    <div class="row">
                        <div class="col">
                            <h4 class="pt-2 font-weight-bold"><?php echo $lang['products']; ?></h4>
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
                                    <p class="mb-2 font-weight-bold"><?php echo $lang['total']; ?>:</p>
                                    <p class="mb-2 font-weight-bold">€<?php echo $order->orderamount_incl_tax ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="pt-2 font-weight-bold"><?php echo $lang['order_info']; ?></h4>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><?php echo $lang['customer_number']; ?>:</p>
                                <p class="p-0 m-0"><?php echo $order->customer_number ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><?php echo $lang['order_number']; ?>:</p>
                                <p class="p-0 m-0"><?php echo $order->order_number ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><?php echo $lang['order_date']; ?>:</p>
                                <p class="p-0 m-0"><?php echo $order->completed_at ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="p-0 m-0"><?php echo $lang['status']; ?>:</p>
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
