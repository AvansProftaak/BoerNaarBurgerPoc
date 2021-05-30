<?php
    include APPROOT."/Views/Includes/header.php";
    require_once '../app/Helpers/language_helper.php';
?>
<div class="col-12">
    <img class="mx-auto d-block" style="max-width:40%" src="../img/logo Boer naar burger_liggend_color.png" alt="Sla">
</div>

<p> Hier komt een stukje tekst </p>

<?php if (isset($_GET['shopLinksZeeland'])) : ?>
<h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?>ZEELAND</h1>
    <?php elseif (isset($_GET['shopLinksWestBrabant'])) : ?>
    <h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?>WEST-BRABANT</h1>
        <?php elseif (isset($_GET['shopLinksMiddenBrabant'])) : ?>
        <h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?><?php echo $lang['midden_brabant']; ?></h1>
            <?php elseif (isset($_GET['shopLinksOostBrabant'])) : ?>
            <h1 class="rh-subtitle-shops"><?php echo $lang['our_shops']; ?><?php echo $lang['oost_brabant']; ?></h1>
<?php endif; ?>

<table style="font-family: 'Dosis', sans-serif;">
  <tr>
    <th class='col-3' style='padding:0'><?php echo ucwords($lang['company_name']) ?></th>
    <th class='col-2' style='padding:0'><?php echo ucwords($lang['address']) ?></th>
    <th class='col-2' style='padding:0'><?php echo ucwords($lang['zipcode']) ?></th>
    <th class='col-2' style='padding:0'><?php echo ucwords($lang['city']) ?></th>
    <th class='col-3' style='padding:0'><?php echo ucwords($lang['description']) ?></th>
  </tr>

<?php if (isset($_GET['shopLinksZeeland'])) : ?>
    <?php foreach($data['shopsZeeland'] as $shop): ?>
    <tr>
        <td class='col-3' style='padding:0'><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
        <td class='col-2' style='padding:0'><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
        <td class='col-2' style='padding:0'><?php echo $shop->postal_code?></td>
        <td class='col-2' style='padding:0'><?php echo ucwords($shop->city) ?></td>
        <td class='col-3' style='padding:0'><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php elseif (isset($_GET['shopLinksWestBrabant'])) : ?>
    <?php foreach($data['shopsWestBrabant'] as $shop): ?>
    <tr>
        <td><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
        <td><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
        <td><?php echo $shop->postal_code?></td>
        <td><?php echo ucwords($shop->city) ?></td>
        <td><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php elseif (isset($_GET['shopLinksMiddenBrabant'])) : ?>
    <?php foreach($data['shopsMiddenBrabant'] as $shop): ?>
    <tr>
        <td><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
        <td><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
        <td><?php echo $shop->postal_code?></td>
        <td><?php echo ucwords($shop->city) ?></td>
        <td><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php elseif (isset($_GET['shopLinksOostBrabant'])) : ?>
    <?php foreach($data['shopsOostBrabant'] as $shop): ?>
    <tr>
        <td><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang'])?></td>
        <td><?php echo ucwords($shop->address) . " " . $shop->house_number?></td>
        <td><?php echo $shop->postal_code?></td>
        <td><?php echo ucwords($shop->city) ?></td>
        <td><?php echo $this->getTranslation($shop->description, $_SESSION['lang'])?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php else : ?>
<h1 class="rh-subtitle-shops"> Error 404</h1>

<?php endif; ?>

<hr class="columnLijn">

<?php require_once APPROOT."/Views/Includes/footer.php";?>
