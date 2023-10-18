<?php

require_once("../library/dbhImproved.php");
require_once("../models/jobApplicant/jobApplicant.model.php");

class JobApplicantController
{

    public function edit(){

    }

    public function delete($id){

    }

    public function display($id){
    }

    public function applyToJob(){

    }
}

$init = new JobApplicantController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["type"]) {
        case "edit":
            $init->edit();
            break;
        case "apply":
            $init->applyToJob();
            break;
    }
}else{
}

