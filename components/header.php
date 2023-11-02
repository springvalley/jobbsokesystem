<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobbsøkesystem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>


<body>
    <?php
  // var_dump($_SESSION);
  ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Finn Jobber</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="foremployer.php">For Arbeidsgiver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logg inn/Registrer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">EN/NO</a>
                    </li>
                    <li class="nav-item">
                        <?php
            if (isset($_SESSION["name"])) {
              echo "<li class=nav-item> <a class=nav-link href=applicantprofile.php?id=" . $_SESSION["jobApplicant_id"] . ">Min Side</a></li>";
            }
            ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <a href="index.php">index || </a>
    <a href="forgotPassword.php">forgot password || </a>
    <a class="done" href="login.php">login || </a>
    <a class="done" href="signup.php">signup || </a>
    <a class="done" href="applicantprofile.php">applicantprofile || </a>
    <a href="postnewjob.php">postnewjob ||</a>
    <a href="companyprofile.php">companyprofile ||</a>
    <a href="companydashboard.php">companydashboard ||</a>
    <a href="companyjobapplication.php">companyjobapplication ||</a>
    <a href="companyjobads.php">companyjobads ||</a>
    <a href="applyjob.php">applyjob || </a>
    <a href="jobapplication.php">jobapplication || </a>
    <a href="jobadvertisementdetail.php">jobadvertisementdetail </a>
    </nav>