<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <div>
                            <img src="../img/noimage.png" alt="Profile Picture" class="rounded-circle w-75 profile-photo"/>
                            <a data-toggle="modal" data-target="#profilePictureModal"><img src ="../img/photo-icon.png" alt="camera-icon" class="photo-icon"></a>
                        </div>
                        <h3 class="white-text p-3"><?php echo $_SESSION['customer_name']; ?></h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers">Gegevens</h2>
                    <hr class="mx-2">
                    <form action="#" method="POST">

                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header">Voornaam</label>
                                <input id="first_name" type="text" class="form-control rounded-borders" value="<?php echo $data->first_name; ?>" name="first_name" required autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header">Achternaam</label>
                                <input id="last_name" type="text" class="form-control rounded-borders" value="<?php echo $data->last_name; ?>" name="last_name" required autocomplete="lname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header">E-Mailadres</label>
                                <input id="email" type="email" class="form-control rounded-borders" name="email" value="<?php echo $data->email; ?>" required autocomplete="email">
                            </div>
                            <!-- password -->
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header">Wachtwoord<span class="pl-3 text-danger user-data-header"></label>
                                <input id="password" type="password" class="form-control rounded-borders" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mx-1">
                            <!-- Street -->
                            <div class="col-4">
                                <label for="street" class="pl-2 user-data-header">Adres</label>
                                <input id="street" type="text" class="form-control rounded-borders" value="<?php echo $data->address; ?>" name="street" required autocomplete="street">
                            </div>
                            <!-- Housenumber -->
                            <div class="col-2">
                                <label for="house_number" class="pl-2 user-data-header">Huisnummer</label>
                                <input id="house_number" type="text" class="form-control rounded-borders" value="<?php echo $data->house_number; ?>" name="house_number" required autocomplete="housenumber">
                            </div>
                            <!-- Zipcode -->
                            <div class="col-sm-2">
                                <label for="zipcode" class="pl-2 user-data-header">Postcode</label>
                                <input id="zipcode" type="text" class="form-control rounded-borders" value="<?php echo $data->postal_code; ?>" name="zipcode" required autocomplete="zipcode">
                            </div>
                            <!-- City -->
                            <div class="col">
                                <label for="city" class="pl-2 user-data-header">Stad</label>
                                <input id="city" type="text" class="form-control rounded-borders" value="<?php echo $data->city; ?>" name="city" required autocomplete="city">
                            </div>
                        </div>

                        <div class="form-group row mb-3 d-flex justify-content-between">
                            <div class="ml-3 pl-3">
                                <button type="submit" class="btn btn-green">Gegevens opslaan</button>
                            </div>
                            <div class="mr-3 pr-3">
                            <button type="button" data-toggle="modal" data-target="#passwordModal" class="btn btn-green">Wachtwoord wijzigen</button>
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
                <h5 class="modal-title user-data-header" id="profilePictureModalLabel">Upload foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body modal-text">
                    <label for="avatar" class="">Een profielfoto uploaden is niet mogelijk in dit proof of concept.</label>
                    <input type="file" class="form-control-file" id="image" name="avatar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bnb-secondary" data-dismiss="modal">Sluiten</button>
                    <!-- Button is Disabled. Uploading a profile picture is out of scope for this POC -->
                    <button type="submit" disabled class="btn btn-green px-2">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title user-data-header" id="passwordModalLabel">Wachtwoord wijzigen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo URLROOT; ?>/customers/accountdetails" method="POST">
                <div class="col mt-3">
                    <p>Vul het formulier in om uw wachtwoord te wijzigen.</p>
                </div>
                <!-- Current Password -->
                <div class="col">
                    <label for="current_password" class="pl-2 user-data-header">Huidig wachtwoord</span></label>
                    <p><span class="pl-3 text-danger user-data-header"><?php echo $passwordData['currentPasswordError'] ?></span></p>
                    <input id="current_password" type="password" class="form-control rounded-borders" name="current_password" autocomplete="current_password">
                </div>

                <!-- New Password -->
                <div class="col">
                    <label for="password" class="pl-2 user-data-header">Nieuw wachtwoord</label>
                    <span class="pl-3 text-danger user-data-header"></span>
                    <input id="password" type="password" class="form-control rounded-borders" name="password" autocomplete="new-password">
                </div>

                <!-- Confirm New Password -->
                <div class="col mb-3">
                    <label for="password-confirm" class="pl-2 user-data-header">Bevestig wachtwoord</span></label>
                    <span class="pl-3 text-danger user-data-header"></span>
                    <input id="password_confirmation" type="password" class="form-control rounded-borders" name="password_confirmation" autocomplete="new-password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-bnb-secondary" data-dismiss="modal">Sluiten</button>
                    <button type="submit" class="btn btn-green px-2">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
