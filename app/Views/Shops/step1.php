<?php include APPROOT."/Views/Includes/headerShop.php"; ?>
<div class="page-container-shop">
    <div>
        <h1 class="shop-title p-2">Aardbeien van René</h1>
    </div>
    <div>
        <img src="../img/aardbeien(2).jpg" class="w-100 py-2" alt="shop image"/>
    </div>
    <div class="pt-4">
        <p>Niks uit de kas, alleen vers van het land de heerlijkste Lambada aardbeien.
            René is een boer met passie die zich inzet voor gezonde en verse aardbeien.
            Dagvers in de zomer. Nu verkrijgbaar in doosjes van 250 gram of XXL per kilo.</p>
    </div>
    <div class="py-4">
        <h3 class="shop-products p-2">Producten</h3>
    </div>
    <hr class="shop-border m-0">

    <!-- 1 product html bewaren, producten inladen met foreach loop -->
    <div class="pt-3 border-shop">
        <div class="d-flex justify-content-between align-items-baseline">
            <div class = "product-width">
                <p>Lambada Aardbeien 250gram
                    <a data-toggle="collapse" href="#description1" role="button" aria-expanded="false" aria-controls="description1">
                        <i class="pl-2 fa fa-chevron-down"></i>
                        <i class="pl-2 fa fa-chevron-up"></i></a></p>
            </div>
            <div class = "price-width">
                <p>€<span id="price">3.49</span></p>
            </div>
            <div class="d-flex justify-content-center align-items-baseline shop-width">
                <button type="button" class="btn-decrement" onclick="decrement(); calculateTotal()">-</button>
                <p id="count" class="px-3">0</p>
                <button type="button" class="btn-increment" onclick="increment(); calculateTotal()">+</button>
            </div>
            <div class = "price-width text-right">
                <p>€<span id="total">0.00</span></p>
            </div>
        </div>
    </div>
    <div id="description1" class="collapse pt-3 border-shop">
        <p>Kleine, maar smaakvolle aardbei. Altijd vers, nooit uit de kas.</p>
    </div>
    <!-- Einde eerste product -->
    <div class="pt-3 border-shop">
        <div class="d-flex justify-content-between align-items-baseline">
            <div class = "product-width">
                <p>Lambada Aardbeien XXL (1 kilo)
                    <a data-toggle="collapse" href="#description2" role="button" aria-expanded="false" aria-controls="description2">
                        <i class="pl-2 fa fa-chevron-down"></i>
                        <i class="pl-2 fa fa-chevron-up"></i></a></p>
            </div>
            <div class = "price-width">
                <p>€<span id="price2">14.00</span></p>
            </div>
            <div class="d-flex justify-content-center align-items-baseline shop-width">
                <button type="button" class="btn-decrement" onclick="decrement2(); calculateTotal()">-</button>
                <p id="count2" class="px-3"></p>
                <button type="button" class="btn-increment" onclick="increment2(); calculateTotal()">+</button>
            </div>
            <div class = "price-width text-right">
                <p>€<span id="total2">0.00</span></p>
            </div>
        </div>
    </div>
    <div id="description2" class="collapse pt-3 border-shop">
        <p>Kleine, maar smaakvolle aardbei. Altijd vers, nooit uit de kas. XXL kilo doos.</p>
    </div>

    <div class="d-flex justify-content-between pt-4">
        <h3 class="font-weight-bolder">Bedrag</h3>
        <h3 class="font-weight-bolder">€<span id="totalAmount">0.00</span></h3>
    </div>
    <div class="text-right pt-4 pb-lg-5">
        <button type="submit" onclick="window.location='<?php echo URLROOT; ?>/shops/step2'" class="btn btn-green btn-padding">Verder</button>
    </div>
</div>
<?php include APPROOT."/Views/Includes/footerShop.php"; ?>
