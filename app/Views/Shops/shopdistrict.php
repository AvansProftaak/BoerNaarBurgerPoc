<?php
    include APPROOT."/Views/Includes/header.php";
    require_once '../app/Helpers/language_helper.php';
?>

<div class="col-12">
    <img class="mx-auto d-block" style="max-width:40%" src="../img/logo Boer naar burger_liggend_color.png" alt="Sla">
</div>

<div class='container '>
    <div class='row justify-content-center rh-div-shopspage'>
        
        <?php if (isset($_SESSION['customer_number'])) : ?>
            <div class='col-10' style='text-align: justify'>
            <p><?php echo $lang['hello']; ?><b><?php echo $_SESSION['customer_name']; ?></b>,</p>
            <?php elseif (!isset($_SESSION['customer_number'])) : ?>
                <div class='col-8' style='text-align: justify'>
                <p><?php echo $lang['hello_new_customer']; ?>,</p>
        <?php endif; ?>
            <p><?php echo $lang['shops_text']; ?></p>
                <div style='text-align: center'>
                <?php echo $lang['shops_text2']; ?><br>
                    <?php if (!isset($_SESSION['customer_number'])) : ?>
                    <strong><u><?php echo $lang['shops_text3']; ?></u></strong>
                    <?php endif; ?>
                </div>
        </div>
        <?php if (!isset($_SESSION['customer_number'])) : ?>
        <div class='col-2'>          
            <button style='width: 90%; margin-top: 20px; margin-bottom: 20px' onclick="document.location='<?php echo URLROOT; ?>/customers/register'" class="rh-login-register-shopspage"><?php echo $lang['register']; ?></button>      
            <button style='width: 90%' onclick="document.location='<?php echo URLROOT; ?>/customers/login'" class="rh-login-register-shopspage"><?php echo $lang['login_button']; ?></button>
        </div>
        <?php endif; ?>
    </div>     
    <br><br>
</div>

<hr class="columnLijn">
<br><br>

<?php if (isset($_GET['shopLinksZeeland'])) : ?>
<h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?>ZEELAND</h1>
    <?php elseif (isset($_GET['shopLinksWestBrabant'])) : ?>
    <h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?>WEST-BRABANT</h1>
        <?php elseif (isset($_GET['shopLinksMiddenBrabant'])) : ?>
        <h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?><?php echo $lang['midden_brabant']; ?></h1>
            <?php elseif (isset($_GET['shopLinksOostBrabant'])) : ?>
            <h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?><?php echo $lang['oost_brabant']; ?></h1>
<?php endif; ?>
<br>

<div class='col-12 row justify-content-center'>
    <div class='col-11'>
        <table style="font-family: 'Montserrat', sans-serif">
        <tr class='rh-tablehead-style'>
            <th class='col-3' style='padding-left: 0.75rem'><?php echo ucwords($lang['company_name']) ?></th>
            <th class='col-2'><?php echo ucwords($lang['address']) ?></th>
            <th class='col-2'><?php echo ucwords($lang['zipcode']) ?></th>
            <th class='col-2'><?php echo ucwords($lang['city']) ?></th>
            <th class='col-3'><?php echo ucwords($lang['description']) ?></th>
        </tr>

        <?php if (isset($_GET['shopLinksZeeland'])) : ?>
            <?php if (!isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsZeeland'] as $shop): ?>
                <tr class='rh-tablerow-style'>
                    <td class='col-3' style='padding-left: padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>

            <?php elseif (isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsZeeland'] as $shop): ?>
                <tr class='rh-tablerow-style'>
                    <td class='col-3' style='padding-left: padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <?php elseif (isset($_GET['shopLinksWestBrabant'])) : ?>
            <?php if (!isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsWestBrabant'] as $shop): ?>
                <tr class='rh-tablerow-style'>
                    <td class='col-3' style='padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>

            <?php elseif (isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsWestBrabant'] as $shop): ?>
                <tr class='rh-tablerow-style rh-clickable-row' onclick="window.location='<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>'">
                    <td class='col-3' style='padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <?php elseif (isset($_GET['shopLinksMiddenBrabant'])) : ?>
            <?php if (!isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsMiddenBrabant'] as $shop): ?>
                <tr class='rh-tablerow-style'>
                    <td class='col-3' style='padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>

            <?php elseif (isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsMiddenBrabant'] as $shop): ?>
                <tr class='rh-tablerow-style'>
                    <td class='col-3' style='padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <?php elseif (isset($_GET['shopLinksOostBrabant'])) : ?>
            <?php if (!isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsOostBrabant'] as $shop): ?>
                <tr class='rh-tablerow-style'>
                    <td class='col-3' style='padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>

            <?php elseif (!isset($_SESSION['customer_number'])) : ?>
                <?php foreach($data['shopsOostBrabant'] as $shop): ?>
                <tr class='rh-tablerow-style'>
                    <td class='col-3' style='padding-left: 0.75rem'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
                    <td class='col-2'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
                    <td class='col-2'><?php echo $shop->postal_code?></td>
                    <td class='col-2'><?php echo ucwords($shop->city) ?></td>
                    <td class='col-3'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

        <?php else : ?>
            <meta http-equiv="refresh" content="0; URL='<?php echo URLROOT; ?>/pages/index'"/> 

        <?php endif; ?>
    </div>
</div>      

<br><br>
<hr class="columnLijn">


<?php require_once APPROOT."/Views/Includes/footer.php";?>
