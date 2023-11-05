<?php

class ErrorHandler
{

    /**
     * Errorhandler class to display errors more properly. 
     * @since 0.5.0
     */

    public static $emptyInputError = "Vennligst fyll ut alle feltene";
    public static $invalidNameError = "Navnet du har valgt er ikke gyldig";
    public static $invalidEmailError = "Emailen du har valgt er ikke gyldig";
    public static $invalidLocationError = "Vennligst velg et gyldig sted";
    public static $invalidIndustryError = "Vennligst velg en gyldig industri";
    public static $invalidEducationError = "Vennligst velg en gyldig utdanning";
    public static $invalidPasswordMatchError = "Passordene du har valgt er ikke like";
    public static $unknownError = "En ukjent feil oppsto, vennligst kontakt en systemadministrator";
    public static $unknownUserError = "Brukeren finnes ikke, vennligst prøv igjen";
    public static $wrongPasswordError = "Passordet er feil, vennligst prøv igjen";



      /**
     * This function is used to set the errormessage member.
     * @param string $errormessage, the message you want to display to the user  
     * @return
     */

     public static function setError($errorMessage){
            session_start();
            $_SESSION["error"] = $errorMessage;
     }

     
      /**
     * This function is used to set the success message.
     * @param string $successmessage, the message you want to display to the user  
     * @return
     */
     public static function setSuccess($successmessage){
        session_start();
        $_SESSION["success"] = $successmessage;
 }

      /**
     * This function is used to display the error message to the user.
     * @param   
     * @return
     */

     public static function displayError(){
        if(isset($_SESSION["error"])){
            echo "<div class= 'alert alert-danger'>" . $_SESSION["error"] . "</div>";
        }
        unset($_SESSION["error"]);
    }

      /**
     * This function is used to display the error message to the user.
     * @param   
     * @return
     */

     public static function displaySuccess(){
        if(isset($_SESSION["success"])){
            echo "<div class= 'alert alert-success'>" . $_SESSION["success"] . "</div>";
        }
        unset($_SESSION["success"]);
    }
}
