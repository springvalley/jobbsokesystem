<?php include "components/header.php" ?>
<?php require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php"; ?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="login.php"><?php echo translate("return_button")?></a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 text-center">
            <h1><?php echo translate("reset_password_title")?></h1>
        </div>
        <div class="col-sm-8 text-center">
            <!--Kanskje tekst burde endres???!-->
            <p class="text-center"><?php echo translate("reset_password_text")?></p>
        </div>
    </div>
    <form>
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <label for="exampleInputEmail1"><?php echo translate("email_label")?></label>
            </div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder='<?php echo translate("email_placeholder")?>'>
            </div>
            <div class="col-sm"></div>
        </div>
        <!--Denne må endres til en button når vi får forms-->
        <div class="col-sm-12 text-center mt-3">
            <button type="submit" name="submit" id="loginbutton" class="btn btn-primary"><?php echo translate("reset_password_button")?></a>
        </div>
    </form>

</div>

<?php include "components/footer.php" ?>