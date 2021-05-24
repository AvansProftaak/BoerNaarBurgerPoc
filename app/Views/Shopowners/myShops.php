<?php include APPROOT."/Views/Includes/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-4">
    <div class="card mt-2">
	    <article class="card-group-item">
		    <header class="card-header">
			    <h6 class="title">mijn shops</h6>
		    </header>
		    <div class="filter-content">
			    <div class="card-body" method="POST" enctype="multipart/form-data" action="<?php echo URLROOT; ?>/shopowners/myShops">
                
                <?php foreach($data as $key => $shop): ?>
                    <!-- shop card -->
                    <div class="p-2">
                        <div class="account-profile-card" style="width: 18rem;">
                        <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="shop-card-header card-title"><?php echo $shop->shop_name ?></h5>
                                <p class="card-text"><?php echo $shop->description ?></p>
                                <a href="<?php echo $shop->shop_number ?>" class="btn btn-green">Ga naar de shop</a>
                            </div>
                        </div>
                    </div>
                    <!-- end shop card -->
                    <?php endforeach; ?>
			    </div>
		    </div>
	    </article>
    </div>
    </div>
  </div>
</div>


<?php include APPROOT."/Views/Includes/footer.php"; ?>
