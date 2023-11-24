<?php include "components/header.php" ;
require_once "/xampp/htdocs/jobbsokesystem/library/languages/lang.php";
?>
<div class="container">   
    <h1 class="db-header">Dashboard</h1>
    <div class="box-container">
        <div class="row">            
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card1"> 
                        <p class="card-title mb-5"><?php echo translate("company_profile_label")?></p>                       
                    </div>
                    <div class="card-footer footer1 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="companyprofile.php">Se detaljert</a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>              
            </div>
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card2"> 
                        <p class="card-title mb-1"><?php echo translate("jobad_label")?></p>
                        <p class="card-title mb-3">20</p>
                    </div>
                    <div class="card-footer footer2 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="companyjobads.php">Se detaljert</a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>              
            </div>
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card3"> 
                        <p class="card-title mb-1"><?php echo translate("applications_label")?></p>
                        <p class="card-title mb-3">15</p>
                    </div>
                    <div class="card-footer footer3 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="companyjobapplication.php">Se detaljert</a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>              
            </div>
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card4"> 
                        <p class="card-title mb-1"><?php echo translate("candidates_label")?></p>
                        <p class="card-title mb-3">10</p>
                    </div>
                    <div class="card-footer footer4 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="#">Se detaljert</a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>              
            </div>
            <div class="col-xl-2 col-ms-4">
                <div class="card mb-4">
                    <div class="card-body card5"> 
                        <p class="card-title mb-1"><?php echo translate("messages_label")?></p>
                        <p class="card-title mb-3">5</p>
                    </div>
                    <div class="card-footer footer5 d-flex align-items-center justify-content-between">
                        <a class="small stretched-link" href="#">Se detaljert</a>
                        <div class="small"><i class="fa-solid fa-angle-right"></i></div>
                    </div>
                </div>              
            </div>


        </div>

    </div>
</div>

<?php include "components/footer.php" ?>