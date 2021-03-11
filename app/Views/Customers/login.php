<?php include APPROOT . "/Views/Includes/header.php"; ?>
<div class="container pt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row account-profile-card">
                <div class="col-4 text-center pt-4 green-background">
                    <div>
                        <img src="../img/logo_Boer_naar_burger.jpg" alt="Profile Picture" class="w-75"/>
                        <h3 class="white-text p-3">Welkom bij Boer naar Burger</h3>
                    </div>
                </div>
                <div class="col pr-2">
                    <h2 class="pt-4 pl-4 data-headers">Log in</h2>
                    <hr class="mx-2">
                    <form method="POST" action="<?php echo URLROOT; ?>/customers/login">
                        <!-- E-mail -->
                        <div class="form-group row mx-1">
                            <div class="col">
                                <label for="email" class="pl-2 user-data-header">E-Mailadres<span class="pl-3 text-danger user-data-header"><?php echo $data['emailError'] ?></span></label>
                                <input id="email" type="email" class="form-control rounded-borders" name="email" placeholder="email@voorbeeld.nl" required autocomplete="email">
                            </div>
                        </div>

                        <!-- password -->
                        <div class="form-group row mx-1">
                            <div class="col">
                                <label for="password" class="pl-2 user-data-header">Wachtwoord<span class="pl-3 text-danger user-data-header"><?php echo $data['passwordError'] ?></span></label>
                                <input id="password" type="password" class="form-control rounded-borders" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="form-group row mb-3">
                            <div class="ml-3 pl-3">
                                <button type="submit" name="submit" class="btn btn-green px-5">Log in</button>
                                <p class="mt-4">Heeft u nog geen account? Klik <a href="<?php echo URLROOT; ?>/customers/register">hier</a> om te registeren.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APPROOT . "/Views/Includes/footer.php"; ?>
