<?php include APPROOT."/Views/Includes/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-4">
    <div class="card mt-2">
	    <article class="card-group-item">
		    <header class="card-header">
			    <h6 class="title">Locatie</h6>
		    </header>
		    <div class="filter-content">
			    <div class="card-body">
			        <form>
                        <?php foreach($data['cities'] as $city): ?>
                        <!-- locations filter-->
                            <label class="form-check">
                                <input class="form-check-input" type="radio" name="location" value="<?php echo $city->city ?>" <?php if ((($_GET['location']) == $city->city)) {echo 'checked="checked"';}; ?>>
                                <span class="form-check-label">
                                    <?php echo $city->city ?>
                                </span>
                            </label>
                        <!-- end locations filter -->
                        <?php endforeach; ?>
                        <button class="btn btn-pink">Zoek</button>
                        <a class="btn btn-green" href="<?php echo URLROOT; ?>/shops/overview">Reset</a>
                    </form>
			    </div>
		    </div>
	    </article>
    </div>
    </div>
    <div class="col-8 row justify-content-center">
    <?php foreach($data['shops'] as $shop): ?>
        <!-- shop card -->
        <div class="p-2">
            <div class="account-profile-card" style="width: 18rem;">
                <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="shop-card-header card-title"><?php echo $shop->shop_name ?></h5>
                    <p class="card-text"><?php echo $shop->description ?></p>
                    <a href="<?php echo URLROOT . '/shops/step1?shop=' . $shop->shop_number ?>" class="btn btn-green">Ga naar de shop</a>
                </div>
            </div>
        </div>
        <!-- end shop card -->
        <?php endforeach; ?>
    </div>
  </div>
</div>


<?php include APPROOT."/Views/Includes/footer.php"; ?>
