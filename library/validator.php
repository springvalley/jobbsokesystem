<?php

/**
 * Validator is a helper class for validating inputs that go through the system. Includes empty inputs, name validation and so on. 
 * @since 0.5.0
 */

class Validator
{
    /**
     * This function is used to check if any of the inputs are empty.
     * @param mixed $inputs can be any number of inputs 
     * @return bool true if any of the inputs are empty, false otherwise. 
     */

    public static function areInputsEmpty(...$inputs)
    {
        foreach ($inputs as $input) {
            if (empty($input)) {
                return true;
            }
        }
        return false;
    }

    /**
     * This function is used to check if a name is valid.
     * @param string $name  
     * @return bool true if the input is valid, false otherwise. 
     */

    public static function isNameValid($name)
    {
        if (!preg_match("/^([a-åA-å' ]+)$/", $name)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * This function is used to check if a email is valid.
     * @param string $email  
     * @return bool true if the input is valid, false otherwise. 
     */

    public static function isEmailValid($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * This function is used to check if two passwords match.
     * @param string $password, $passwordRepeat
     * @return bool true if the inputs match, false otherwise. 
     */

    public static function doPasswordsMatch($password, $passwordRepeat)
    {
        if ($password !== $passwordRepeat) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * This function is used to check if a phone number is valid.
     * @param string $phonenumber
     * @return bool true if the input is valid, false otherwise. 
     */

    public static function isPhoneNumberValid($phonenumber)
    {
        if (!preg_match("/^[0-9]{8}$/", $phonenumber)) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * This function is used to check if a location is valid.
     * @param string $location
     * @return bool true if the input is valid, false otherwise. 
     */
    public static function isLocationValid($location)
    {
        return !$location == 0;
    }


    /**
     * This function is used to check if a jobtype is valid.
     * @param string $jobtype
     * @return bool true if the input is valid, false otherwise. 
     */
    public static function isJobTypeValid($jobType)
    {
        return !$jobType == 0;
    }


    /**
     * This function is used to check if a education is valid.
     * @param string $education
     * @return bool true if the input is valid, false otherwise. 
     */
    public static function isEducationValid($education)
    {
        return !$education == 0;
    }

    /**
     * This function is used to check if a industry is valid.
     * @param string $industry
     * @return bool true if the input is valid, false otherwise. 
     */
    public static function isIndustryValid($industry)
    {
        return !$industry == 0;
    }

    /**
     * This function is used to check if empty input application deadline date.
     * @param mixed $applicationDeadline The Value to be checked for emptiness.
     * @return bool true if input field is empty, false otherwise. 
     */
    public static function isEmptyInputApplicationDeadline($applicationDeadline)
    {
        if (empty($applicationDeadline)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check if the application deadline date is out of date.
     * @param mixed $applicationDeadline The Value to be checked and compared with the current date.
     * @return bool true if the application deadline is smaller than the current date, false otherwise. 
     */
    public static function isOldApplicationDeadlineDate($applicationDeadline)
    {
        $today = date("d-m-Y");
        if (strtotime($applicationDeadline) <= strtotime($today)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check if a user is logged into the system.
     * @return bool true if logged in, false otherwise. 
     */

    public static function isLoggedIn()
    {
        return isset($_SESSION["id"]);
    }

    /**
     * This function is used to check if an employer is logged into the system.
     * @return bool true if logged in, false otherwise. 
     */

    public static function isEmployer()
    {
        if (Validator::isLoggedIn()) {
            return ($_SESSION["userType"]) == "employer";
        }
    }

    /**
     * This function is used to check if a jobapplicant is logged into the system.
     * @return bool true if logged in, false otherwise. 
     */
    public static function isJobApplicant()
    {
        if (Validator::isLoggedIn()) {
            return ($_SESSION["userType"]) == "jobapplicant";
        }
    }

    /**
     * This function is used to check if someone owns a resource, i.e profile or job listing.
     * @param int the ID of the user. 
     * @return bool true if owned, false otherwise. 
     */
    public static function ownsResource($resourceID)
    {
        if (Validator::isLoggedIn()) {
            return ($_SESSION["id"]) == $resourceID;
        }
    }

    /**
     * This function is used to check if an employer has been logged in.
     * @param int $employerId The employer id to be checked.
     * @return bool true if an employer has not logged in, false otherwise. 
     */
    public static function isEmployerLoggedIn($employerId)
    {
        if (empty($employerId)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check if the current user session indicates that a user has been logged in and has a role of employer.    
     * @return bool true if a user is logged in as employer, false otherwise. 
     */
    public static function isLoggedInAsEmployer()
    {
        $employer = ($_SESSION["id"]) && $_SESSION["userType"] === "employer";
        return $employer;
    }


    /**
     * This function is used to check if the logged in user is the owner of the job advertisement.   
     * This function determines ownership by comparing the company name associated with the job advertisement to the name stored
     * in the session for the logged-in user.
     * @param string $jobAdCompanyName The name of the company associated with the job ad to be compared.
     * @return bool true if the logged-in user is the employer who creates the job advertisement, false otherwise. 
     */
    public static function isJobAdOwner($jobAdCompanyName)
    {
        //Check if the user id session is not set or if the logged-in user is not employer
        if (!isset($_SESSION["id"]) || $_SESSION["userType"] !== "employer") {
            return false; //If the user is not logged-in as an employer.
        }
        //If the user is logged-in as an employer, so check the company name of the session
        //matches the provided company name ($jobAdCompanyName) of the job advertisement
        return $_SESSION["name"] === $jobAdCompanyName;
    }

    public static function isEmptyFile($file)
    {
        if (empty($file)) {
            return true;
        } else {
            return false;
        }
    }

    public static function is_uploaded_file($file)
    {
        if (is_uploaded_file($file)) {
            return true;
        } else {
            return false;
        }
    }

    //Check whether folder exists
    public static function foler_exists($fileFolder)
    {
        if (!file_exists($fileFolder)) {
            if (!mkdir($fileFolder, 0777, true)) {
                return false;
            }
        } else {
            return true;
        }
    }

    public static function is_correct_fileType($fileType, $allowedFileType)
    {
        if (!in_array($fileType, $allowedFileType)) {
            return false;
        } else {
            return true;
        }
    }
}