<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row account-profile-card">
                <div class="col-3 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3">Registreer als Burger</h3>
                    </div>
                </div>
                <div class="col-9 pr-2">
                    <h2 class="pt-4 pl-4 data-headers">Account registreren</h2>
                    <hr class="mx-2">

                    <form
                            id="register-form"
                            method="POST"
                            action="<?php echo URLROOT; ?>/customers/register"
                    >
                        <div class="form-group row mx-1">
                            <!-- First Name -->
                            <div class="col-5">
                                <label for="first_name" class="pl-2 user-data-header">Voornaam<span class="pl-3 text-danger"><?php echo $data['firstNameError'] ?></span></label>
                                <input id="first_name" type="text" class="form-control rounded-borders" placeholder="Jan" name="first_name" autocomplete="fname">
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <label for="last_name" class="pl-2 user-data-header">Achternaam<span class="pl-3 text-danger"><?php echo $data['lastNameError'] ?></span></label>
                                <input id="last_name" type="text" class="form-control rounded-borders" placeholder="Bakker" name="last_name" autocomplete="lname">
                            </div>
                        </div>

                        <!-- E-mail Address -->
                        <div class="form-group row mx-1 mb-0">
                            <div class="col-5">
                                <label for="email" class="pl-2 user-data-header">E-Mailadres<span class="pl-3 text-danger"><?php echo $data['emailError'] ?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders" name="email" placeholder="email@voorbeeld.nl" autocomplete="email">
                            </div>

                            <div class="col">
                                <label for="password" class="pl-2 user-data-header">Wachtwoord</label>
                                <input id="password" type="password" class="form-control rounded-borders" name="password" autocomplete="new-password">
                            </div>

                            <div class="col">
                                <label for="password-confirm" class="pl-2 user-data-header">Bevestig wachtwoord</span></label>
                                <input id="password_confirmation" type="password" class="form-control rounded-borders" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row float-right mr-4 mt-0">
                            <span class="pl-3 text-danger user-data-header"><?php echo $data['passwordError'] ?></span>
                            <span class="pl-3 text-danger user-data-header"><?php echo $data['confirmPasswordError'] ?></span>
                        </div>

                        <!-- Register Button -->
                        <div class="form-group row mb-3 mt-4">
                            <div class="ml-3 pl-3">
                                <button type="submit" class="btn btn-green px-5">Registreer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
