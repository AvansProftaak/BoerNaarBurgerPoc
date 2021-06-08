<?php
    require_once '../app/Helpers/language_helper.php';
    setlocale(LC_TIME, "");
    setlocale(LC_ALL, 'nl_NL'); 
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Ordernummer <?php echo $data['order_number']?></title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
	    <div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
                                    <img src="../img/logo_Boer_naar_burger.jpg" alt="Logo" style="width: 100%; max-width: 150px">
                                   
								</td>

								<td>									
                                    <b>Orderdatum:</b> <?php 
                                                    $orderMoment = strtotime($data['completed_at']);
                                                    $date = strftime("%d %B %Y", $orderMoment);
                                                    $time = strftime("%H:%M", $orderMoment);
                                                    echo $date
                                                ?><br />
									<b>Ordernummer:</b> #<?php echo $data['order_number']?> 

								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
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
					<td>Betalingsmethode</td>

					<td>Status #</td>
				</tr>

				<tr class="details">
					<td><?php echo $data['payment_method']?></td>

					<td><?php echo $data['payment_status']?></td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Prijs</td>
				</tr>
                <?php foreach ($data['product_item'] as $productItem) : ?> 
				<tr class="item">
					<td><?php echo $this->getTranslation($productItem->name, $_SESSION['lang'])?></td>

					<td><?php echo "€ " . $productItem->price?></td>
				</tr>
                <?php endforeach; ?>


				<tr class="total">
					<td></td>

					<td>Totaal incl. BTW: <?php echo "€ " . $data['order_price_tax']?><br />
                        <span style='font-weight:100'>9% BTW: <?php echo "€ " . number_format(($data['order_price_tax'] - $data['order_price']), 2); ?></span><br />
                        <span style='font-weight:100'>Totaal excl. BTW: <?php echo "€ " . number_format($data['order_price'], 2);?></span></td>
				</tr>
			</table>
            <img src="../img/logo Boer naar burger_liggend_color.png" alt="Logo" style="max-width: 50%; display: block; margin: 0 auto">
		</div>
	</body>
</html>