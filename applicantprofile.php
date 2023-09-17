<?php include "components/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-md-3 applicantProfile">
            <img src="img/test.jpg">
            <div class="contactInfo">
                <p>Navn: John Doe</p>
                <p>Telefonnummer: 000 000 000 </p>
                <p>E-post: Johndoe@google.com </p>
                <p>Sted: Kristiansand</p>
            </div>
        </div>
        <div class="col-md-9 profile-info">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Min profil</button>
                    <button class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Jobbhistorikk</button>
                    <button class="nav-link" id="nav-favorite-tab" data-bs-toggle="tab" data-bs-target="#nav-favorite" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Favoritter</button>
                    <button class="nav-link" id="nav-message-tab" data-bs-toggle="tab" data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Meldinger</button>
                </div>

            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                    <!--Må fikse knappen senere-->
                    <div>
                        <button type="button" class="editProfileButton"> Redigere Profil
                        </button>
                    </div>
                    <div class="CV-header">
                        <p>Sammendrag:</p>
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
                    <div class="CV-header">
                        <p>Erfaring:</p>
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
                    <div class="CV-header">
                        <p>Utdanning:</p>
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
                    <div class="CV-header">
                        <p>Kompetanse:</p>
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
                    <div class="CV-header">
                        <p>Oppdater CV</p>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="formFile" class="form-label">Last opp din CV</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <button type="submit" class="btn btn-success">Last opp ny CV</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row ">
                        <div class="row mt-3">
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
                <div class="tab-pane fade mt-3" id="nav-favorite" role="tabpanel" aria-labelledby="nav-profile-tab">
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