<?php
require_once "../library/validator.php";
/**
 * The 'FileUPloadHandler' is used to handle file upload. 
 * This class is created for reusing 'uploadFile' function in different places.
 * @since 
 * 
 */

class FileUploadHandler
{

    /**
     * This function is used to upload file
     * @param $file The file is uploaded by users.
     * @return $filePath The path of the file. This path will be stored in the database.
     */
    public static function uploadFile($file)
    {

        //Check whethere CV and diploma are uploaded, otherwise display error message
        //'tmp_name' attribute holds the temporary location of the uploaded file
        if (Validator::is_uploaded_file($file["tmp_name"])) {

            //Define diretory to store uploaded files
            $fileFolder = $_SERVER['DOCUMENT_ROOT'] . "/jobbsokesystem/assets/uploadFiles/";


            //Check if the directory does not exist, create a new directory.
            //However, if it fails to create a new directory, display error message.
            if (!Validator::foler_exists($fileFolder)) {
                ErrorHandler::setError("Kan ikke opprette en ny mappe!");
                return false;
            }

            //Define which file type is allowed for uploading file
            $allowedFileType = array(
                "jpg" => "image/jpeg",
                "png" => "image/png",
                "pdf" => "application/pdf",
            );
            //Validate filetype
            $fileType = $file["type"];
            //Construct name of the uploaded files by generating unique IDs for uploaded file 
            //Using 'array_search' function to search for the extension of the uploaded file based on its MIME type: 
            //https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types
            //Return corresponding key (the file extension[jpg, png, etc.] in case the MIME type of uploaded image file in the array)
            $fileName = substr(hash('sha256', uniqid('', true)), 0, 8) . "." . array_search($fileType, $allowedFileType);
            if (!Validator::is_correct_fileType($fileType, $allowedFileType)) {
                ErrorHandler::setError("Ugyldig filtype! Du kan kun laste opp en fil som har type: JPG, PNG og PDF. Vennligst, prøv på nytt!");
                return false;
            }

            //Construct the file path
            $filePath = $fileFolder . $fileName;


            //Move uploaded file from temporary location to the specific file path               
            if (!move_uploaded_file($file["tmp_name"], $filePath)) {
                ErrorHandler::setError("Kan ikke laste opp bildet. Vennligst, prøv på nytt!");
                return false;
            }
            return $filePath;
        }
    }
}
