 <?php
    //Model 

    class Joblisting extends DB_Handler
    {

        //protected method to keep the data safe so that the other classes cannot access to these methods here or extend to this class.
        protected function setJobAds($employerId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName)
        {
            //stmt = statement
            //variable "statement" is set to $this class and point to connect function that is in DB_Handler
            //with this connection we run the sql statement and query it inside the database by using the method "prepare"
            $stmt = $this->connect()->prepare("INSERT INTO joblisting(employer_id, job_title, description, jobType_id,
            location_id, published_time, is_Active, industry_id, position_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");

            //Check if the actual excution of the statement sql fails.
            //using method call "excute". And inside the "execute" statement, we are going to insert the data that is going to replace the question marks
            //We can run the query into the database first, and then afterwards we can submit the data that needs to be filled in. In this sort of way, 
            //we can prevent sql injection into our database because we separate the data from the query.

            //if this one is fail, so not run the rest of the code
            if (!$stmt->execute(array($employerId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName))) {
                $stmt = null; //delete the statement entirely
                header("location:  ../postnewjob.php?error=stmtFailed"); //send user back to the page with the errormessage.
                exit();
            }
            $stmt = null;
        }

        protected function setNewJobAds($jobListingId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName)
        {
            $stmt = $this->connect()->prepare("UPDATE joblisting SET job_title = ?, description = ? , jobType_id = ?, 
            location_id = ?, published_time = ?, is_active = ?,  industry_id = ?, position_name = ?,
            WHERE joblisting_id = ?;");

            if (!$stmt->execute(array($jobListingId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName))) {
                $stmt = null; //delete the statement entirely
                header("location:  ../postnewjob.php?error=stmtFailed"); //send user back to the page with the errormessage.
                exit();
            }
            $stmt = null;
        }

        protected function getJobAdsByEmployer($employerId)
        {
            $stmt = $this->connect()->prepare("SELECT * FROM joblisting WHERE employer_id = ?;");
            if (!$stmt->execute(array($employerId))) {
                $stmt = null; //delete the statement entirely
                header("location:  ../postnewjob.php?error=stmtFailed"); //send user back to the page with the errormessage.
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: index.php?error=jobbannonsenfinnesikke");
                exit();
            }
            $jobListingByEmployerData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $jobListingByEmployerData;
        }

        protected function getAllJobAds($jobListingId)
        {
            $stmt = $this->connect()->prepare("SELECT * FROM joblisting WHERE jobListing_id = ?;");

            if (!$stmt->execute(array($jobListingId))) {
                $stmt = null; //delete the statement entirely
                header("location:  ../postnewjob.php?error=stmtFailed"); //send user back to the page with the errormessage.
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: index.php?error=jobbannonsenfinnesikke");
                exit();
            }
            //if the jobads exists in database.
            //$stmt is the statement that we just executed or queried inside our database
            //and using method "fetchAll" and then in () means to tell how we want to fetch the data
            //using PDO method and we want to fetch this one as associative array.
            //Basically, it means when we grab the data from the database, and actually have to use it inside our code
            //and reference to the data, we want to be able to reference to the data based on the column name inside the database.          
            $jobListingData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $jobListingData;
        }

        public function getLocation($locationId)
        {
            $stmt = $this->connect()->prepare("SELECT * FROM location");
            if ($stmt->execute(array($locationId))) {
                $stmt = null;
                header("location: ../postnewjob.php?error=stmtFailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: /postnewjob.php?error=stmtFailed");
                exit();
            }
            $locationData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $locationData;
        }

        public function getJobType($jobTypeId)
        {
            $stmt = $this->connect()->prepare("SELECT * FROM jobtype");
            if ($stmt->execute(array($jobTypeId))) {
                $stmt = null;
                header("location: ../postnewjob.php?error=stmtFailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: /postnewjob.php?error=stmtFailed");
                exit();
            }
            $jobTypeData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $jobTypeData;
        }

        public function getIndustry($industryId)
        {
            $stmt = $this->connect()->prepare("SELECT * FROM industry");
            if ($stmt->execute(array($industryId))) {
                $stmt = null;
                header("location: ../postnewjob.php?error=stmtFailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: /postnewjob.php?error=stmtFailed");
                exit();
            }
            $industryData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $industryData;
        }
    }
