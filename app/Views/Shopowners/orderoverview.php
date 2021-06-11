<!-- Hier haalt hij de header op  --> 
<?php include APPROOT . "/Views/Includes/header.php"; ?>


<style>
        .rh-orders {
            font-family: 'Montserrat', sans-serif;
            border-collapse: collapse;
            width: 100%;
            align-content: center;
        }

        .rh-orders td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .rh-orders tr:nth-child(even){background-color: #E38F88;;}

        .rh-orders tr:hover {background-color: #ddd;}

        .rh-orders th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #34744d;
            color: white;
            padding-left: 8px;
        }

        .rh-orders-h1-style {
            font-family: 'Montserrat', sans-serif;
            color: #34744d;
            font-weight: bold;
            text-align: center;
        }

        .rh-btn_orderstatus {
            background-color: #005622;
            color: whitesmoke;
            border-radius: 20px;
            font-size: 15px;
            text-align: center;
            font-family: 'Dosis', sans-serif;
            transition: 0.4s;
            border: 1px solid black;
        }

        .rh-btn_orderstatus:hover {
            background-color:gold;
            border: 1px solid #005622;
            color: black;
        }
        </style>






<div class="container col-11">
<img src="../img/logo Boer naar burger_liggend_color.png" alt="Logo" style="max-width: 30%; display: block; margin: 0 auto;">
<br><br>

<h1 class='rh-orders-h1-style'><?php echo strtoupper($lang['overview_pending']) ?> ORDERS:</h1>

<table style="width:100%" class="rh-orders" >
    <tr>
        <th><?php echo ucfirst($lang['order_number']); ?></th>
        <th><?php echo ucfirst($lang['product_number']); ?></th>
        <th><?php echo ucfirst($lang['product_name']); ?></th>
        <th><?php echo ucfirst($lang['amount']); ?></th>
        <th><?php echo ucfirst($lang['customer_name']); ?></th>
        <th><?php echo ucfirst($lang['phone_number']); ?></th>
        <th><?php echo ucfirst($lang['order_date']); ?></th>
        <th>Status</th>
    </tr>
    <?php foreach ($data['orders'] as $orders) : ?>
        <?php if ($orders->status == "PENDING") :?>
            <tr>
        <td><?php echo $orders->order_number ?></td>
        <td><?php echo $orders->product_number ?></td>
        <td><?php echo $this->getTranslation($orders->product_name, $_SESSION['lang']); ?></td>
        <td><?php echo $orders->amount . "x"?></td>
        <td><?php echo $orders->first_name . " " . $orders->last_name ?></td>
        <td><?php echo $orders->phone_number ?></td>
        <td>
            <?php if ($_SESSION['lang'] == "en") {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%I:%M %p", $orderMoment);                                                        

                echo $date . ", " .  $time ;

            } else {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%H:%M", $orderMoment);

                echo $date . ", " .  $time . " uur"; } 
            ?>
        </td>
        <td style='text-align:center'>
            <form method="POST"  action="<?php echo URLROOT . '/shopowners/orderoverview?order_number=' . $orders->order_number ?>">
                <input type="submit" name="close_order" value="<?php echo $lang['close_order']; ?>" class="rh-btn_orderstatus"><br/>
            </form>     


        </td>
    </tr>
            <?php endif; ?>
    <?php endforeach; ?>
</table>


<br><br>


<h1 class='rh-orders-h1-style'><?php echo strtoupper($lang['overview_completed2']) ?> ORDERS:</h1>

<table style="width:100%" class="rh-orders justify-content-center">
    <tr>
    <th><?php echo ucfirst($lang['order_number']); ?></th>
        <th><?php echo ucfirst($lang['product_number']); ?></th>
        <th><?php echo ucfirst($lang['product_name']); ?></th>
        <th><?php echo ucfirst($lang['amount']); ?></th>
        <th><?php echo ucfirst($lang['customer_name']); ?></th>
        <th><?php echo ucfirst($lang['phone_number']); ?></th>
        <th><?php echo ucfirst($lang['order_date']); ?></th>
        <th>Status</th>
    </tr>
    <?php foreach ($data['orders'] as $orders) : ?>
        <?php if ($orders->status == "COMPLETED") :?>
    <tr>
    <td><?php echo $orders->order_number ?></td>
        <td><?php echo $orders->product_number ?></td>
        <td><?php echo $this->getTranslation($orders->product_name, $_SESSION['lang']); ?></td>
        <td><?php echo $orders->amount . "x"?></td>
        <td><?php echo $orders->first_name . " " . $orders->last_name ?></td>
        <td><?php echo $orders->phone_number ?></td>
        <td>
            <?php if ($_SESSION['lang'] == "en") {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%I:%M %p", $orderMoment);                                                        

                echo $date . ", " .  $time ;

            } else {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%H:%M", $orderMoment);

                echo $date . ", " .  $time . " uur"; } 
            ?>
        </td>
        <td style='text-align:center'>
            <form method="POST"  action="<?php echo URLROOT . '/shopowners/orderoverview?order_number=' . $orders->order_number ?>">
                <input type="submit" name="open_order" value="<?php echo $lang['open_order']; ?>" class="rh-btn_orderstatus"><br/>
            </form>     


        </td>
    </tr>
<?php endif; ?>
    <?php endforeach; ?>
</table>

<br><br>

<h1 class='rh-orders-h1-style'><?php echo strtoupper($lang['overview_canceled']) ?> ORDERS:</h1>

<table style="width:100%" class="rh-orders" >
    <tr>
        <th><?php echo ucfirst($lang['order_number']); ?></th>
        <th><?php echo ucfirst($lang['product_number']); ?></th>
        <th><?php echo ucfirst($lang['product_name']); ?></th>
        <th><?php echo ucfirst($lang['amount']); ?></th>
        <th><?php echo ucfirst($lang['customer_name']); ?></th>
        <th><?php echo ucfirst($lang['phone_number']); ?></th>
        <th><?php echo ucfirst($lang['order_date']); ?></th>
        <th>Status</th>
    </tr>
    <?php foreach ($data['orders'] as $orders) : ?>
        <?php if ($orders->status == "CANCELED") :?>
            <tr>
        <td><?php echo $orders->order_number ?></td>
        <td><?php echo $orders->product_number ?></td>
        <td><?php echo $this->getTranslation($orders->product_name, $_SESSION['lang']); ?></td>
        <td><?php echo $orders->amount . "x"?></td>
        <td><?php echo $orders->first_name . " " . $orders->last_name ?></td>
        <td><?php echo $orders->phone_number ?></td>
        <td>
            <?php if ($_SESSION['lang'] == "en") {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%I:%M %p", $orderMoment);                                                        

                echo $date . ", " .  $time ;

            } else {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%H:%M", $orderMoment);

                echo $date . ", " .  $time . " uur"; } 
            ?>
        </td>
        <td style='text-align:center'>
            <form method="POST"  action="<?php echo URLROOT . '/shopowners/orderoverview?order_number=' . $orders->order_number ?>">
                <input type="submit" name="close_order" value="<?php echo $lang['open_order']; ?>" class="rh-btn_orderstatus"><br/>
            </form>     


        </td>
    </tr>
            <?php endif; ?>
    <?php endforeach; ?>
</table>


<br><br>


<h1 class='rh-orders-h1-style'><?php echo strtoupper($lang['overview_expired']) ?> ORDERS:</h1>

<table style="width:100%" class="rh-orders justify-content-center">
    <tr>
        <th><?php echo ucfirst($lang['order_number']); ?></th>
        <th><?php echo ucfirst($lang['product_number']); ?></th>
        <th><?php echo ucfirst($lang['product_name']); ?></th>
        <th><?php echo ucfirst($lang['amount']); ?></th>
        <th><?php echo ucfirst($lang['customer_name']); ?></th>
        <th><?php echo ucfirst($lang['phone_number']); ?></th>
        <th><?php echo ucfirst($lang['order_date']); ?></th>
        <th>Status</th>
    </tr>
    <?php foreach ($data['orders'] as $orders) : ?>
        <?php if ($orders->status == "EXPIRED") :?>
    <tr>
    <td><?php echo $orders->order_number ?></td>
        <td><?php echo $orders->product_number ?></td>
        <td><?php echo $this->getTranslation($orders->product_name, $_SESSION['lang']); ?></td>
        <td><?php echo $orders->amount . "x"?></td>
        <td><?php echo $orders->first_name . " " . $orders->last_name ?></td>
        <td><?php echo $orders->phone_number ?></td>
        <td>
            <?php if ($_SESSION['lang'] == "en") {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%I:%M %p", $orderMoment);                                                        

                echo $date . ", " .  $time ;

            } else {
                $orderMoment = strtotime($orders->order_date);
                $date = strftime("%d %B %Y", $orderMoment);
                $time = strftime("%H:%M", $orderMoment);

                echo $date . ", " .  $time . " uur"; } 
            ?>
        </td>
        <td style='text-align:center'>
            <form method="POST"  action="<?php echo URLROOT . '/shopowners/orderoverview?order_number=' . $orders->order_number ?>">
                <input type="submit" name="open_order" value="<?php echo $lang['open_order']; ?>" class="rh-btn_orderstatus"><br/>
            </form>     


        </td>
    </tr>
<?php endif; ?>
    <?php endforeach; ?>
</table>


<br><br>
    </div>


<!-- Hier haalt hij de footer op  --> 
<?php include APPROOT . "/Views/Includes/footer.php"; ?>