<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<?php require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php"; ?>
<?php require_once "/xampp/htdocs/jobbsokesystem/library/validator.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo translate("title") ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light" style="background: #E3EFF9;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent"
                    style="margin-left: 10px; margin-right: 10px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><?php echo translate("home_nav") ?></a>
                        </li>
                        <?php if (!Validator::isLoggedIn()) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><?php echo translate("login") ?></a>
                        </li>
                        <?php } ?>

                        <?php if (Validator::isLoggedIn() && Validator::isEmployer()) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="postnewjob.php"><?php echo translate("post_new_job") ?></a>
                        </li>
                        <?php } ?>

                    </ul>
                    <ul class="navbar-nav">
                        <?php
            if (Validator::isLoggedIn()) {
              if (Validator::isEmployer()) {
                echo "               

                <li class='nav-item dropdown'>             
                <a class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fa-regular fa-circle-user fa-xl' style='margin-right: 5px;'></i>" . htmlspecialchars($_SESSION["name"]) . "</a>              
                  <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                      <li>
                        <a class='dropdown-item' href=companyprofile.php?id=" . htmlspecialchars($_SESSION["id"]) . ">" . translate("company_profile") . "</a>                      
                      </li>
                      <li>
                        <a class='dropdown-item' href=companydashboard.php?id=" . htmlspecialchars($_SESSION["id"]) . ">" . translate("dashboard") . "</a>                      
                      </li>
                       <li>
                        <a class='dropdown-item' href='./controllers/users.controller.php?q=logout'>" . translate("logout") . "</a>                      
                      </li>
                  </ul>
                </li>               
                ";
              } else {
                echo "               
                <li class='nav-item dropdown'>             
                <a class='nav-link dropdown-toggle' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fa-regular fa-circle-user fa-xl' style='margin-right: 5px;'></i>" . htmlspecialchars($_SESSION["name"]) . "</a>              
                  <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                      <li>
                        <a class='dropdown-item' href=applicantprofile.php?id=" . htmlspecialchars($_SESSION["id"]) . ">" . translate("applicant_profile") . "</a>                      
                      </li>
                      <li>
                        <a class='dropdown-item' href=myjobapplications.php?id=" . htmlspecialchars($_SESSION["id"]) . ">" . translate("view_my_jobapplications") . "</a>                      
                      </li>
                       <li>
                        <a class='dropdown-item' href='./controllers/users.controller.php?q=logout'>" . translate("logout") . "</a>                      
                      </li>
                  </ul>
                </li>               
                ";
              }
            }
            ?>
                    </ul>

                    <form action="./library/languages/changelanguage.php" method="post" id="language-form">
                        <select class="form-select" name="language"
                            onchange="document.getElementById('language-form').submit();">
                            <option value="english" <?php echo $_SESSION['lang'] == 'english' ? 'selected' : '' ?>>
                                <?php echo translate("english") ?>
                            </option>
                            <option value="norwegian" <?php echo $_SESSION['lang'] == 'norwegian' ? 'selected' : '' ?>>
                                <?php echo translate("norwegian") ?>
                            </option>
                        </select>
                    </form>
                </div>
            </div>
        </nav>

    </div>

</body>
<script>
document.getElementById('language-select').addEventListener('change', function() {
    this.form.submit();
});
</script>