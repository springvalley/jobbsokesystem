<?php

class Validator
{

    /**
     * Validator is a helper class for validating inputs that go through the system. Includes empty inputs, name validation and so on. 
     * @since 0.5.0
     */


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

    public static function isEmptyInputApplicationDeadline($applicationDeadline)
    {
        if (empty($applicationDeadline)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isOldApplicationDeadlineDate($applicationDeadline)
    {
        $today = date("d-m-Y");
        if (strtotime($applicationDeadline) <= strtotime($today)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isEmployerLoggedIn($employerId)
    {
        if (empty($employerId)) {
            return true;
        } else {
            return false;
        }
    }
}
