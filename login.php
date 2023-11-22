<?php include "components/header.php" ?>
<?php require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php"; ?>
<?php require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php"; ?>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card" style="border-radius: 1rem;">
                <div class="card-body p-5">
                    <h1><?php echo translate("login_title")?></h1>
                    <?php ErrorHandler::displayError() ?>
                    <?php ErrorHandler::displaySuccess() ?>
                    <nav style="margin-bottom: 1rem">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo translate("applicant_subtitle")?></button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo translate("employer_subtitle")?></button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="./controllers/users.controller.php" method="POST">
                                <input name="type" value="login" hidden/>
                                <input name="jobapplicant" value=1 hidden />
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo translate("email_label")?></label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder='<?php echo translate("email_placeholder")?>'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><?php echo translate("password_label")?></label>
                                    <input type="password" class="form-control" name="password" id="passord" placeholder='<?php echo translate("password_placeholder")?>'>
                                </div>
                                <p><a href="forgotPassword.php"><?php echo translate("forgot_password_button")?></a></p>
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <a id="cancelButton" class="btn btn-danger" style="margin-right: 10px" href="index.php"><?php echo translate("cancel_button")?></a>
                                        <button name="submit" type="submit" id="loginButton" class="btn btn-primary"><?php echo translate("signin_button")?></button>
                                    </div>
                                </div>
                                <p style="text-align:center">
                                <?php echo translate("new_account_text")?>
                                </p>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="./controllers/users.controller.php" method="POST">
                                <div class="form-group">
                                    <input name="type" value="login" hidden/>
                                    <input name="jobapplicant" value=0 hidden />
                                    <label for="exampleInputEmail1"><?php echo translate("email_label")?></label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder='<?php echo translate("email_placeholder")?>'>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1"><?php echo translate("password_label")?></label>
                                    <input type="password" class="form-control" name="password" id="passord" placeholder='<?php echo translate("password_placeholder")?>'>
                                </div>
                                <p><a href="forgotPassword.php"><?php echo translate("forgot_password_button")?></a></p>
                                <!--Denne må endres til en button når vi får forms-->
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <a id="cancelButton" class="btn btn-danger" style="margin-right: 10px" href="index.php"><?php echo translate("cancel_button")?></a>
                                        <button name="submit" type="submit" id="loginButton" class="btn btn-primary"><?php echo translate("signin_button")?></button>
                                    </div>
                                </div>
                                <p style="text-align:center">
                                <?php echo translate("new_account_text")?>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "components/footer.php" ?>