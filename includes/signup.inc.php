
<?php 
include "../classes/dbh.php";
include "../classes/signup.repo.php";
include "../classes/signup.controller.php";


//Sjekker om brukeren kom til denne siden på riktig måte
if(isset($_POST["submit"])){
    //Sjekker om formen som ble submitted er fra arbeidssøker eller giver, hvis denne verdien er 1 er det arbeidssøker. 
         $isJobApplicant = $_POST["jobapplicant"];
    //Henter verdiene fra formen. 
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];
        $orgNumber = 1000;

        //Hvis dette er en bedrift så henter vi også organisasjonsnummeret. 
    if($isJobApplicant == 0){
        $orgNumber = $_POST["orgNumber"];
    }


    $signupController = new SignUpController($name, $email, $phone, $password, $repeatPassword, $orgNumber);
    echo $signupController->printAll();
    if($isJobApplicant == 1){
        $signupController->signUpUser();
    }    else{
        $signupController->signUpEmployer();
    }
    header("location: ../signup.php?error=none");
} ?>