<?php include APPROOT . "/Views/Includes/header.php"; ?>

<div class="container col-12">
    <div class="row justify-content-center">
        <div class="col-xl-3 rh-div-shopspage" style='margin-top: 100px'>
            <div style='text-align: justify'>
                <p><?php echo $lang['hello']; ?><b><?php echo $_SESSION['customer_name']; ?></b>,</p>
                <br>Leuk dat je lid bent van Boer naar Burger. 
                Dit is je overzichtspagina. Aan de rechterzijde van deze pagina vind je je historische bestellingen. <br>
                Weet je echter je ordernummer, dan kun je ook zoeken op ordernummer.
            </div>
        </div>
            <div class="col-xl-9">
                <h2 class="lh-subtitel pt-4"><?php echo $lang['order_overview']; ?></h2>

                <div class="container">
                <br/> 
                    <!-- searchbar voor orders -->
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <form method='post' class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="<?php echo $lang['searchfield']; ?>" name='searchorders'>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit" style='margin-left: 4px'><?php echo $lang['search']; ?></button>
                                    </div>                               
                                </div>
                            </form>
                        </div>

                            <!-- als er geen eerdere orders zijn geweest -->
                        <?php if(!$data['orders']) : ?>
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

                        <!-- als niets is ingevoerd in de searchbar krijg je alle eerdere orders te zien -->
                        <?php  if (empty($_POST['searchorders'])) : ?>
                        <?php foreach($data['orders'] as $order): ?>
                        <div class="col-md-12">
                            <div class="pt-5">
                                <h3 class="shop-products p-2"><?php echo $lang['order'] . ' ' . $order->order_number ?>
                                    <a data-toggle="collapse" href="#order-id<?php echo $order->order_number ?>" role="button" aria-expanded="true" aria-controls="order-id<?php echo $order->order_number ?>">
                                        <i class="fa fa-chevron-up chevron-category float-right px-2"></i>
                                        <i class="fa fa-chevron-down chevron-category float-right px-2"></i>
                                    </a>
                                </h3>
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
                                                <p class="col-1"><?php echo $item->amount ?>x</p>
                                                <p class="col-9"><?php echo $this->getTranslation($item->product, $_SESSION['lang']); ?><span style='padding-left:1em'><strong>(<?php echo $this->getTranslation($item->shop, $_SESSION['lang']); ?>)</strong></span></p>
                                                <p class="col-2">€<?php echo $item->price ?></p>
                                            </div>
                                            <?php endforeach; ?>
                                            <div class="pt-2 d-flex align-items-baseline">
                                                <p class="col-10 font-weight-bold"><?php echo $lang['total']; ?>:</p>
                                                <p class="col-2 font-weight-bold">€<?php echo $order->orderamount_incl_tax ?></p>
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
                                            <p class="p-0 m-0"> 
                                                <?php 
                                                $orderMoment = strtotime($order->completed_at);
                                                $date = strftime("%A %d %B %Y", $orderMoment);
                                                $time = strftime("%H:%M", $orderMoment);
                                                echo $date . " om " .  $time . " uur" ?>

                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="p-0 m-0"><?php echo $lang['status']; ?>:</p>
                                            <p class="p-0 m-0"><?php echo $order->status ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo URLROOT . '/customers/invoice?order='. $order->order_number ?>" class=" rh-shops-topbuttons" style='border-radius: 0px; font-size: 13px'><?php echo $lang['open_invoice']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                        <!-- als er een ordernummer is ingevoerd in de searchbar -->
                        <?php elseif (isset($_POST['searchorders'])):
                        $searchResults = 0 ?>
                            <?php foreach($data['orders'] as $order): ?>

                        <!-- als het ordernummer overeenkomt met een uitgevoerde order -->
                        <?php if ($order->order_number == $_POST['searchorders']) : ?>
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
                                            <?php $items = $this->orderModel->getOrderDetails($order); // items toewijzing aan ordermodel->$order
                                            foreach($items as $item) : ?>
                                            <div class="pt-2 d-flex justify-content-between align-items-baseline border-shop">
                                                <p class="mb-2"><?php echo $item->amount ?>x</p>
                                                <p class="mb-2"><?php echo $this->getTranslation($item->product, $_SESSION['lang']); ?><span style='padding-left:1em'><strong>(<?php echo $this->getTranslation($item->shop, $_SESSION['lang']); ?>)</strong></span></p>
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
                                            <p class="p-0 m-0">                                            
                                                <?php                                             
                                                    $orderMoment = strtotime($order->completed_at);
                                                    $date = strftime("%A %d %B %Y", $orderMoment);
                                                    $time = strftime("%H:%M", $orderMoment);
                                                    echo $date . " om " .  $time . " uur" 
                                                ?> 
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="p-0 m-0"><?php echo $lang['status']; ?>:</p>
                                            <p class="p-0 m-0"><?php echo $order->status ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>                                                    
                        <?php $searchResults++; endif;?>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                        <?php if ($searchResults == 0) : ?>
                        <div class="col-md-12 justify-content-center">
                            <br><br>
                            <h4 class="rh-h4-orderonbekend">Ordernummer onbekend.<br>Voer géén of een ander ordernummer in.</h4>
                        </div>  
                        <hr>    
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>                    
                    
            </div>




<?php include APPROOT . "/Views/Includes/footer.php"; ?>