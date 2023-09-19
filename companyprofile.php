<?php include "components/header.php" ?>

<div class="container">
    <!--Denne linken må endres for at det ikke vises seg til jobbsøker-->
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="companydashboard.php">Tilbake Dashboard</a>
            </div>
        </div>
    </div>

    <div class="row d-flex align-items-center justify-content-center company-profile">
        <div class="col-md-7 col-lg-5 col-xl-5">           
            <img src="img/img_company.jpg" class="company-image">
        </div>
        <div class="col-md-8 col-lg-7 col-xl-6 offset-xl-1 profile-tab">
            <nav>
                <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Om bedrift</button>
                    <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Kontakt</button> -->
                    <button class="nav-link" id="nav-job-ads-tab" data-bs-toggle="tab" data-bs-target="#nav-job-ads" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Jobbannonser</button>
                    <!-- <button class="nav-link" id="nav-message-tab" data-bs-toggle="tab" data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Meldinger</button> -->
                </div>

            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!--Må fikse knappen senere-->
                    <div>
                        <button type="button" class="editProfileButton mt-3"> Redigere Profil
                        </button>
                    </div>
                    <div class="profile-header">
                        <p>Bedriftsnavn</p>
                    </div>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum lectus nulla, nec
                        placerat urna aliquam vitae. Integer luctus egestas efficitur. Aliquam pellentesque vel magna at
                        tincidunt. In feugiat malesuada venenatis. Etiam massa ipsum, finibus ut posuere et, eleifend
                        sit
                        amet nisl. Suspendisse scelerisque molestie dolor, at vulputate diam dapibus sed. Donec aliquet
                        bibendum mi a interdum. Duis id tempor odio.

                        Aenean quis dolor eleifend, scelerisque diam sed, convallis sapien. Praesent mollis nec ipsum
                        quis
                        consectetur. Pellentesque sed ante in justo venenatis elementum. Proin congue scelerisque leo,
                        vel
                        auctor augue lobortis eget. Pellentesque habitant morbi tristique senectus et netus et malesuada
                        fames ac turpis egestas. Vivamus nec turpis placerat, suscipit nulla nec, euismod orci. Donec
                        consectetur varius risus in viverra. Sed ut faucibus purus. Nunc augue tortor, malesuada non
                        sagittis mattis, imperdiet et magna. Interdum et malesuada fames ac ante ipsum primis in
                        faucibus.
                        Sed dignissim elementum nunc eget tincidunt. </p>
                    <div class="profile-header">
                        <p>Kontakt oss</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Bedriftsnavn:</b> </li>
                            <li class="list-group-item"><b>Organisasjon nr.:</b> 0123456789</li>
                            <li class="list-group-item"><b>Bedriftstelefon nr.:</b> +47 1345678</li>
                            <li class="list-group-item"><b>Kontaktperson:</b> ABC</li>
                            <li class="list-group-item"><b>Telefon nr.:</b></li>
                            <li class="list-group-item"><b>E-post:</b> abc@xyz.no</li>
                            <li class="list-group-item"><a href="#">Besøk vår hjemmesider her</a></li>
                        </ul>
                    </div>
                    <p>

                    </p>


                </div>
                <div class="tab-pane fade" id="nav-job-ads" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row ">
                        <div class="row">
                            <div class="col-6 mt-3 mb-3">
                                <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
                            </div>
                            <button type="button" class="searchButtonIcon"> Søk
                                <!-- <i class="fas fa-search"></i> -->
                            </button>
                        </div>

                    </div>
                    <?php include "components/joblist.php" ?>
                    <?php include "components/joblist.php" ?>
                    <?php include "components/joblist.php" ?>
                    <?php include "components/joblist.php" ?>                    
                </div>


            </div>

        </div>
    </div>

</div>
<?php include "components/footer.php" ?>