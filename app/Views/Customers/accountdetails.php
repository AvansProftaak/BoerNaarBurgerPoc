<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <div>
                            <img src="
                                <?php
                                    if(!isset($data['profile_image_url'])) :
                                        if($_SESSION['lang'] == 'nl') : ?>../img/noimage.png<?php else : ?>../img/noimageEN.png<?php endif;
                                    else :
                                    echo '../img' . $data['profile_image_url'];
                                    endif;
                                ?>"
                                 alt="Profile Picture" class="profile-photo"/>
                            <a data-toggle="modal" data-target="#profilePictureModal"><img src ="../img/photo-icon.png" alt="camera-icon" class="photo-icon"></a>
                        </div>
                        <h3 class="white-text p-3"><?php echo $_SESSION['customer_name']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers"><?php echo $lang['personal_data']; ?></h2>
                    <hr class="mx-2">
                    <form action="<?php echo URLROOT; ?>/customers/accountdetails" method="POST">

                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header"><?php echo $lang['first_name']; ?><span class="pl-3 text-danger"><?php if($data['firstNameError']) : echo $lang[$data['firstNameError']]; endif;?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders <?php if($data['firstNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['first_name']; ?>" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header"><?php echo $lang['last_name']; ?><span class="pl-3 text-danger"><?php if($data['lastNameError']) : echo $lang[$data['lastNameError']]; endif;?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders <?php if($data['lastNameError']) : ?> is-invalid <?php endif; ?>" value="<?php echo $data['last_name']; ?>" name="last_name" autocomplete="lname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header"><?php echo $lang['email']; ?><span class="pl-3 text-danger"><?php if($data['emailError']) : echo $lang[$data['emailError']]; endif;?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders <?php if($data['emailError']) : ?> is-invalid <?php endif; ?>"
                                       name="email" value="<?php echo $data['email']; ?>" autocomplete="email">
                            </div>
                            <!-- password -->
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header"><?php echo $lang['password']; ?><span class="pl-3 text-danger"><?php if($data['passwordError']) : echo $lang[$data['passwordError']]; endif;?></span></label>
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

                        <!-- Success/failure messages on changing data -->
                        <?php if(isset($_GET['uploadsuccess'])) : ?>
                        <div class="form-group row mx-1">
                            <div class="col alert-success font-weight-bold"><?php echo $lang['upload_success']; ?></div>
                        </div>
                        <?php endif;

                        if(isset($_GET['success'])) : ?>
                            <div class="form-group row mx-1">
                                <div class="col alert-success font-weight-bold"><?php echo $lang['change_success']; ?></div>
                            </div>
                        <?php endif;

                        if(isset($_GET['failed'])) : ?>
                            <div class="form-group row mx-1">
                                <div class="col alert-danger font-weight-bold"><?php echo $lang['change_failed']; ?></div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group row mb-3 d-flex justify-content-between">
                            <div class="ml-3 pl-3">
                                <button name = "submit-personal-data" type="submit" class="btn btn-green"><?php echo $lang['save_personal_data']; ?></button>
                            </div>
                            <div class="mr-3 pr-3">
                            <a type="button" href="<?php echo URLROOT; ?>/customers/changepassword" class="btn btn-green"><?php echo $lang['change_password']; ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Profile Picture Modal -->
<div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title user-data-header" id="profilePictureModalLabel"><?php echo $lang['upload_photo']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo URLROOT; ?>/customers/accountdetails" method="POST" enctype="multipart/form-data">
                <div class="form-group modal-body modal-text">
                    <label for="profile_image_url"><?php echo $lang['profile_picture']; ?></label><br>
                    <span id="image-error" class="text-danger font-weight-bold"><?php if($data['imageError']) : echo $lang[$data['imageError']]; endif; ?></span>
                    <input type="file" class="form-control-file" id="profile_image_url" name="profile_image_url">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bnb-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                    <button type="submit" name="submit-profile-picture" class="btn btn-green px-2"><?php echo $lang['save']; ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // jquery function that keeps the modal open if errors are displayed
    $(document).ready(function () {
        if (document.getElementById('image-error').innerHTML.length > 0) {
            $('#profilePictureModal').modal('show');
        }
    });
</script>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
