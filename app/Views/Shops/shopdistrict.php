<?php
    include APPROOT."/Views/Includes/header.php";
    require_once '../app/Helpers/language_helper.php';
?>


<div class='container'>
    <div class='row col-lg-12 justify-content-between'>
        <button class="col-2 rh-shops-topbuttons" onclick="document.location='<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksZeeland=a_value;'">Zeeland</button>
        <button class="col-2 rh-shops-topbuttons" onclick="document.location='<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksWestBrabant=a_value'">West-Brabant</button>
        <button class="col-2 rh-shops-topbuttons" onclick="document.location='<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksMiddenBrabant=a_value'"><?php echo $lang['midden_brabant']; ?></button>
        <button class="col-2 rh-shops-topbuttons" onclick="document.location='<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksOostBrabant=a_value'"><?php echo $lang['oost_brabant']; ?></button>
        <button class="col-2 rh-shops-topbuttons-all" onclick="document.location='<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksAll=a_value'"><?php echo ucfirst($lang['shops_all2']); ?></button>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-7">
            <form method='post' class="card card-sm">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body"></i>
                    </div>
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="<?php echo $lang['searchfield_shops']; ?>" name='searchfield_shops'>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="submit" style='margin-left: 4px; border: 1px solid #005622'><?php echo $lang['search']; ?></button>
                    </div>                               
                </div>
            </form>
        </div>
    </div>
</div>

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
            </div>
        </div>

        <?php if (!isset($_SESSION['customer_number'])) : ?>
        <div class='col-2'>          
            <button style='width: 90%; margin-top: 20px; margin-bottom: 20px' onclick="document.location='<?php echo URLROOT; ?>/customers/register'" class="rh-login-register-shopspage"><?php echo $lang['register']; ?></button>      
            <button style='width: 90%' onclick="document.location='<?php echo URLROOT; ?>/customers/login'" class="rh-login-register-shopspage"><?php echo $lang['login_button']; ?></button>
        </div>
        <?php endif; ?>
    </div>    
    <br>
</div>

<br><br><br>

<!-- HIER START HET SHOPS CONTENT GEDEELTE -->
<div class='col-12 row justify-content-center'>
    <div class='col-8'>

    <!-- HIER WORDT DE TITEL VAN HET SHOPSGEDEELTE AANGEPAST AAN DE INVOER VAN DE GEBRUIKER -->
    <?php if (!isset($_POST['searchfield_shops'])) : ?>
        <?php if (isset($_GET['shopLinksZeeland'])) : ?>
            <h1 class="rh-subtitle-shops"><?php echo strtoupper($lang['our_shops']); ?>ZEELAND</h1>
                <?php elseif (isset($_GET['shopLinksWestBrabant'])) : ?>
                <h1 class="rh-subtitle-shops"><?php echo strtoupper($lang['our_shops']); ?>WEST-BRABANT</h1>
                    <?php elseif (isset($_GET['shopLinksMiddenBrabant'])) : ?>
                    <h1 class="rh-subtitle-shops"><?php echo strtoupper($lang['our_shops']); ?><?php echo strtoupper($lang['midden_brabant']); ?></h1>
                        <?php elseif (isset($_GET['shopLinksOostBrabant'])) : ?>
                        <h1 class="rh-subtitle-shops"><?php echo strtoupper($lang['our_shops']); ?><?php echo strtoupper($lang['oost_brabant']); ?></h1>
                            <?php elseif (isset($_GET['shopLinksAll'])) : ?>
                                <h1 class="rh-subtitle-shops"><?php echo $lang['shops_all']; ?></h1>
        <?php endif; ?>
    <?php else : ?>                
        <?php if (empty($_POST['searchfield_shops'])) : ?>
        <h1 class="rh-subtitle-shops"><?php echo strtoupper($lang['no_search_string']); ?></h1> 
            <?php elseif (isset($_POST['searchfield_shops'])) : ?>
            <h1 class="rh-subtitle-shops"><?php echo strtoupper($lang['our_shops']); ?><?php echo strtoupper($_POST['searchfield_shops']) ?></h1>
        <?php endif; ?>
    <?php endif; ?>

    <br>
<hr class="columnLijn">
    <!-- HIER WORDEN DE OPGEVRAAGDE SHOPS WEERGEGEVEN BIJ GEBRUIK VAN SEARCHBAR-->
    <!-- als er NIET is ingelogd wordt nooit de url van de shop meegezonden -->
    <div class="p-2 row justify-content-between">
     
    <?php if (isset($_POST['searchfield_shops'])) : ?>
        <?php foreach ($data['shopsAll'] as $shop) : ?> 
            <?php if ($shop->city == ucfirst($_POST['searchfield_shops'])) : ?>
            <div class="account-profile-card" style="width: 18rem;" style='pointer-events: none'>
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green"><?php echo $lang['go_to_shop']; ?></a>
                </div>
            </div>   
            <?php elseif ($shop->product == ucfirst($_POST['searchfield_shops'])) : ?>
            <div class="account-profile-card" style="width: 18rem;" style='pointer-events: none'>
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                </div>
            </div>   
            <?php endif; ?>
        <?php endforeach; ?>

    <!-- bij gebruik van de omgeving-keuzebuttons -->
    <!-- ZEELAND -->
    <?php elseif (isset($_GET['shopLinksZeeland'])) : ?>
            <?php foreach($data['shopsZeeland'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green"><?php echo $lang['go_to_shop']; ?></a>
                </div>
            </div>
            <?php endforeach; ?>
    <!-- WEST-BRABANT -->
    <?php elseif (isset($_GET['shopLinksWestBrabant'])) : ?>
            <?php foreach($data['shopsWestBrabant'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green"><?php echo $lang['go_to_shop']; ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <!-- MIDDEN-BRABANT -->
    <?php elseif (isset($_GET['shopLinksMiddenBrabant'])) : ?>
        <?php if (!isset($_SESSION['customer_number'])) : ?>
            <?php foreach($data['shopsMiddenBrabant'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php elseif (isset($_SESSION['customer_number'])) : ?>
            <?php foreach($data['shopsMiddenBrabant'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green"><?php echo $lang['go_to_shop']; ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    <!-- OOST-BRABANT -->
    <?php elseif (isset($_GET['shopLinksOostBrabant'])) : ?>
        <?php if (!isset($_SESSION['customer_number'])) : ?>
            <?php foreach($data['shopsOostBrabant'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php elseif (isset($_SESSION['customer_number'])) : ?>
            <?php foreach($data['shopsOostBrabant'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green"><?php echo $lang['go_to_shop']; ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    <!-- ALLE SHOPS -->
    <?php elseif (isset($_GET['shopLinksAll'])) : ?>
        <?php if (!isset($_SESSION['customer_number'])) : ?>
            <?php foreach($data['shopsAll'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php elseif (isset($_SESSION['customer_number'])) : ?>
            <?php foreach($data['shopsAll'] as $shop): ?>
            <div class="account-profile-card" style="width: 18rem; margin-bottom: 30px">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                    <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']); ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green"><?php echo $lang['go_to_shop']; ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    <?php endif; ?>
    </div>
</div>      

<br><br>
<hr class="columnLijn">


<?php require_once APPROOT."/Views/Includes/footer.php";?>
