<?php include APPROOT."/Views/Includes/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-4">
    <div class="card mt-2">
	    <article class="card-group-item">
		    <header class="card-header">
			    <h6 class="title">mijn shop</h6>
		    </header>

        <!-- 
            here we show the shopowners data

            TODO: make button to go to order overview and to change data 

          -->

        <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['personal_data']; ?></h2>
                    <hr class="mx-2">
                    <form action="<?php echo URLROOT; ?>/shopowners/accountDetails" method="POST">

                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['first_name']; ?><span class="pl-3 text-danger"><?php echo $data['firstNameError'] ?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['firstNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['first_name']; ?>" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['last_name']; ?><span class="pl-3 text-danger"><?php echo $data['lastNameError'] ?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders <?php if($data['lastNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['last_name']; ?>" name="last_name" autocomplete="lname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?><span class="pl-3 text-danger"><?php echo $data['emailError'] ?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>"
                                       name="email" value="<?php echo $data['email']; ?>" autocomplete="email">
                            </div>
                            <!-- password -->
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?><span class="pl-3 text-danger"><?php echo $data['passwordError'] ?></span></label>
                                <input id="password" type="password" class="form-control rounded-borders <?php if($data['passwordError']) : ?> is-invalid <?php endif; ?>" name="password" autocomplete="passwordd">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- Street -->
                            <div class="col-4">
                                <label for="address" class="pl-2 user-data-header"><?php echo $lang['street']; ?></label>
                                <input id="address" type="text" class="form-control rounded-borders" value="<?php echo $data['address']; ?>" name="address" autocomplete="street">
                            </div>
                            <!-- Housenumber -->
                            <div class="col-2">
                                <label for="house_number" class="pl-2 user-data-header"><?php echo $lang['house_number']; ?></label>
                                <input id="house_number" type="text" class="form-control rounded-borders" value="<?php echo $data['house_number']; ?>" name="house_number" autocomplete="housenumber">
                            </div>
                            <!-- Zipcode -->
                            <div class="col-sm-2">
                                <label for="postal_code" class="pl-2 user-data-header"><?php echo $lang['zipcode']; ?></label>
                                <input id="postal_code" type="text" class="form-control rounded-borders" value="<?php echo $data['postal_code']; ?>" name="postal_code" autocomplete="postal_code">
                            </div>
                            <!-- City -->
                            <div class="col">
                                <label for="city" class="pl-2 user-data-header"><?php echo $lang['city']; ?></label>
                                <input id="city" type="text" class="form-control rounded-borders" value="<?php echo $data['city']; ?>" name="city" autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row mb-3 d-flex justify-content-between">
                            <div class="ml-3 pl-3">
                                <button name = "submit-personal-data" type="submit" class="btn btn-green"><?php echo $lang['save_personal_data']; ?></button>
                            </div>
                            <div class="mr-3 pr-3">
                            <a type="button" href="<?php echo URLROOT; ?>/customers/changepassword" class="btn btn-green"><?php echo $lang['change_password']; ?></a>
                            </div>








		    <div class="filter-content">
          <!-- 
            here we show the shop the shopowner has created

            TODO: make the button go to shop add/remove and update items 

          -->
			    <div class="card-body" method="POST" enctype="multipart/form-data" action="<?php echo URLROOT; ?>/shopowners/myShop">
                
                <?php foreach($data as $key => $shop): ?>
                    <!-- shop card -->
                    <div class="p-2">
                        <div class="account-profile-card" style="width: 18rem;">
                        <img class="card-img-top bottom-border" src="../img<?php echo $shop->banner_url ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="shop-card-header card-title"><?php echo $this->getTranslation($shop->shop_name, $_SESSION['lang']); ?></h5>
                                <p class="card-text"><?php echo $this->getTranslation($shop->description, $_SESSION['lang']);?></p>
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
