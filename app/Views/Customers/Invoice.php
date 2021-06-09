<?php
    require_once '../app/Helpers/language_helper.php';

	if ($_SESSION['lang'] == "nl") {
		setlocale(LC_TIME, "");
		setlocale(LC_ALL, 'nl_NL'); 
	}
 ?>

<?php if ($_SESSION['customer_number'] == $data['customer_number']) : ?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title><?php echo $lang['order_number']; ?> <?php echo $data['order_number']?></title>
		<link href="../css/invoice.css" rel="stylesheet">
	</head>

	<body>
	    <div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
                                    <img src="../img/logo_Boer_naar_burger.jpg" alt="Logo" style="width: 100%; max-width: 150px">                                  
								</td>

								<td>									
                                    <b><?php echo $lang['order_date']; ?>:</b> <?php 
                                                    $orderMoment = strtotime($data['completed_at']);
                                                    $date = strftime("%d %B %Y", $orderMoment);
                                                    echo $date
                                                ?><br />
									<b><?php echo $lang['order_number']; ?>:</b> #<?php echo $data['order_number']?> 
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
									Boer naar Burger B.V.<br />
									Burgerkinglaan 232<br />
									4811 BB Breda
								</td>

								<td>
									<?php echo $data['first_name'] . " " . $data['last_name']?><br />
									<?php echo $data['address'] . " " . $data['house_number']?><br />
									<?php echo $data['postal_code'] . " " . $data['city']?><br />
									<?php echo $data['email']?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td><?php echo $lang['invoice_payment_method']; ?></td>
					<td></td>
					<td></td>
					<td>Status #</td>
				</tr>

				<tr class="details">
					<td><?php echo $data['payment_method']?></td>
					<td></td>
					<td></td>
					<td>
						<?php
							if ($data['payment_status'] == ("AUTHORIZED")) {
								echo(strtoupper($lang['invoice_payment_success']));
							}
								else {
									echo(strtoupper($lang['invoice_payment_fail']));	
								}
						?>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>
					<td style='text-align: left'><?php echo $lang['invoice_quantity']; ?></td>
					<td style='text-align: left'><?php echo $lang['invoice_unitprice']; ?></td>
					<td><?php echo $lang['invoice_price']; ?></td>
				</tr>

                <?php foreach ($data['product_item'] as $productItem) : ?> 
				<tr class="item">
					<td><?php echo $this->getTranslation($productItem->name, $_SESSION['lang'])?></td>
					<td style='text-align: left'><?php echo $productItem->amount?></td>
					<td style='text-align: left'><?php echo "€ " . $productItem->price?></td>
					<td><?php echo "€ " . $productItem->total_item_price?></td>
				</tr>
                <?php endforeach; ?>
														
				<tr>
					<td></td>
					<td></td>
					<td style='text-align: right; padding-left: 150px'>
						<b><?php echo $lang['invoice_total_tax']; ?></b><br />
						<?php echo $lang['invoice_tax']; ?><br />
						<?php echo $lang['invoice_total_no_tax']; ?><br />
					</td>
					<td >
						<b><?php echo "€ " . $data['order_price_tax'] ?></b><br />
						<?php echo "€ " . number_format(($data['order_price_tax'] - $data['order_price']), 2) ?><br />
						<?php echo "€ " . number_format($data['order_price'], 2) ?></td>
				</tr>
				
			</table>
            <img src="../img/logo Boer naar burger_liggend_color.png" alt="Logo" style="max-width: 50%; display: block; margin: 0 auto; margin-top:200px;">
		</div>
	</body>
</html>

<?php else : ?> 


<html>

<head>
	<meta charset="utf-8" />
	<title>Error 404:<?php echo $lang['invoice_page_not_found']; ?></title>
	<link href="../css/invoice.css" rel="stylesheet">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body style='background: #dedede;'>

	<div class="page-wrap d-flex flex-row align-items-center" style='min-height: 100vh'>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center">
				<img src="../img/logo Boer naar burger_liggend_color.png" alt="Logo" style="max-width: 70%; display: block; margin: 0 auto;">
					<span class="display-1 d-block">404</span>
					<div class="mb-4 lead"><?php echo $lang['invoice_404_error']; ?></div>
					<a href="<?php echo URLROOT; ?>/pages/index" class="btn btn-link"><?php echo $lang['invoice_back_to_home']; ?></a>
				</div>
			</div>
		</div>
	</div>

</body>

</html>

<?php endif; ?>