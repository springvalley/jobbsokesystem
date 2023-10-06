<?php include "components/header.php";
    include "classes/jobApplicant.view.php";

    $jobApplicantView = new JobApplicantViewModel(1);
?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="foremployer.php">Tilbake søkeresultat</a>
            </div>
        </div>
        <div>
            <button type="button" class="editProfileButton">Send melding</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 applicantProfile">
            <img src="img/test.jpg">
            <div class="contactInfo">
                <p>Navn: <?php echo $jobApplicantView->getName()?></p>
                <p>Telefon: <?php echo $jobApplicantView->getPhoneNumber()?></p>
                <p>E-Post: <?php echo $jobApplicantView->getEmail()?></p>
                <p>Sted: <?php echo $jobApplicantView->getLocation_id()?></p>
            </div>
        </div>
        <div class="col-md-9 profile-info">
            <div class="CV-header">
                <p>Sammendrag:</p>
            </div>
            <p> <?php echo $jobApplicantView->getSummary()?></p>
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
                <p>CV</p>
                <form>
                    <button type="submit" class="btn btn-success">Last ned CV</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php include "components/footer.php" ?>