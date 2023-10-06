<?php include "components/header.php"


?>
<div class="container">
    <div class="flex-container">
        <div>
            <div class="goBackLink mb-3">
                <i class="fa-solid fa-angle-left"></i>
                <a href="index.php">Tilbake søkeresultat</a>
            </div>
        </div>
        <div>
            <button type="button" class="editProfileButton">Send melding</button>
        </div>
    </div>
    <div class="job-listing-small">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">Bedriftsnavn</div>
                    <div class="col-6">Bransje:</div>
                    <div class="col">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-1">
                        <b style="font-size: 20px;">Jobbtittel</b>
                    </div>
                    <div class="col-6 mt-1">Stillingtittel:</div>
                    <div class="col-6 mt-1">Ansettelsesform</div>
                    <div class="col-6 mt-1">Sted</div>

                </div>
                <div class="flex-container mt-1">
                    <div>Publiseringdato: dd.mm.YYYY</div>
                    <div style="color: red;">Frist: dd.mm.YYYY</div>
                    <div>
                        <a class="btn btn-primary" data-toggle="collapse" href="applyjob.php" role="button" aria-expanded="false">Søk Stilling</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="job-content mt-3">
            <h4><b>Om jobben</b></h4>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum lectus nulla, nec
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
                Sed dignissim elementum nunc eget tincidunt.

            </p>

        </div>
    </div>
</div>
<?php include "components/footer.php" ?>