<?php     session_start(); ?>
<?php require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo translate("title")?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>


<body>
  <?php 
    var_dump($_SESSION);
  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="navbar-brand" href="#">
              <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php"><?php echo translate("home_nav")?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php"><?php echo translate("find_job_nav")?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="foremployer.php"><?php echo translate("for_employer_nav")?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><?php echo translate("login/register_nav")?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./library/languages/changelanguage.php">EN/NO</a>
          </li>
          <li class="nav-item">
            <?php 
              if(isset($_SESSION["name"])){
                echo "<li class=nav-item> <a class=nav-link href=applicantprofile.php?id=".$_SESSION["id"].">". translate("my_account_nav") ."</a></li>";
              }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <a  href="index.php">index || </a>
  <a href="forgotPassword.php">forgot password || </a>
  <a class="done" href="login.php">login || </a>
  <a class="done" href="signup.php">signup || </a>
  <a class="done" href="applicantprofile.php?id=1">applicantprofile || </a>
  <a href="postnewjob.php">postnewjob ||</a>
  <a href="companyprofile.php?id=1">companyprofile ||</a>
  <a href="companydashboard.php">companydashboard ||</a>
  <a href="companyjobapplication.php">companyjobapplication ||</a>
  <a href="companyjobads.php">companyjobads ||</a>
  <a href="applyjob.php">applyjob || </a>
  <a href="jobapplication.php">jobapplication || </a>
  <a href="jobadvertisementdetail.php">jobadvertisementdetail </a>
  </nav>