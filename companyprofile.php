<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jobbsøkesystem</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="navbar-brand" href="#">
              <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Finn Jobber</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">For Arbeidsgiver</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Logg inn/Registrer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">EN/NO</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <a href="index.php">index || </a>
  <a href="forgotPassword.php">forgot password || </a>
  <a href="login.php">login || </a>
  <a href="signup.php">signup || </a>
  <a href="applicantprofile.php">applicantprofile || </a>
  <a href="companyrprofile.php">companyprofile ||</a>
  <a href="postnewjob.php">postnewjob ||</a>
  <a href="companyprofile.php">companyprofile ||</a>
  <a href="companyprofiledashboard.php">companyprofiledashboard ||</a>
  <a href="applyjob.php">applyjob </a><div class="container">
    <div class="row">
        <div class="col-2">
            <img class ="profilepicture" src="img/logo.jpg">
        </div>
        <div class="col-3">
        </div>
        <div class="col-6 contactinfo">
            <br>
            <br>
            <br>
            <p>Bedriftsnavn: COMPANY INC</p>
            <p>Organisasjonsnummer: 000 000 000 </p>
            <p>Kontaktperson: 000 000 000 </p>
            <p>Telefonnummer: 000 000 000 </p>
            <p>E-post: Johndoe@google.com </p>
            <p>Om bedriften: We are a company</p>
        </div>
    </div>
    <hr class="my-4">
    <div class="row">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Min profil</button>
                <button class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Jobbhistorikk</button>
                <button class="nav-link" id="nav-favorite-tab" data-bs-toggle="tab" data-bs-target="#nav-favorite" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Favoritter</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
                <p>Sammendrag:</p>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum lectus nulla, nec placerat urna aliquam vitae. Integer luctus egestas efficitur. Aliquam pellentesque vel magna at tincidunt. In feugiat malesuada venenatis. Etiam massa ipsum, finibus ut posuere et, eleifend sit amet nisl. Suspendisse scelerisque molestie dolor, at vulputate diam dapibus sed. Donec aliquet bibendum mi a interdum. Duis id tempor odio.
                </p>
                <p>Erfaring:</p>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum lectus nulla, nec placerat urna aliquam vitae. Integer luctus egestas efficitur. Aliquam pellentesque vel magna at tincidunt. In feugiat malesuada venenatis. Etiam massa ipsum, finibus ut posuere et, eleifend sit amet nisl. Suspendisse scelerisque molestie dolor, at vulputate diam dapibus sed. Donec aliquet bibendum mi a interdum. Duis id tempor odio.

                </p>
                <p>Utdanning:</p>
                <ul>
                    <li>Barneskole: </li>
                    <li>Ungdomsskole: </li>
                    <li>Universitet: </li>
                </ul>
                <p>Kompetanse:</p>
                <ul>
                    <li>Kurs i truckkjøring </li>
                    <li>Kurs i kokkeri </li>
                    <li>Kurs i oppvask </li>
                </ul>
                <p>Oppdater CV</p>
                <form>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Last opp din CV</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-success">Last opp ny CV</button>
                </form>


            </div>
            <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    <div class="col-3">
                        <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
                    </div>
                </div>
                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>            </div>
            <div class="tab-pane fade" id="nav-favorite" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>                <div class="job-listing-small">
    <div class="row">
        <div class="col-4">Bedriftsnavn</div>
        <div class="col-4">Bransje</div>
        <div class="col-2"></div>
        <div class="col-1">NY</div>
        <div class="col-1"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg></div>
    </div>

    <div class="row">
        <div class="col-11"><h4>Jobbtittel</h4></div>
    </div>
    <div class="row">
        <div class="col-3">Stillingstittel</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 192c0 87.4-117 243-168.3 307.2c-12.3 15.3-35.1 15.3-47.4 0C117 435 0 279.4 0 192C0 86 86 0 192 0S384 86 384 192z"/></svg>  Sted</div>
        <div class="col-3"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> Ansettelsesform</div>
        <div class="col-3"></div>
    </div>
    <div class="row">
        <div class="col-3">Publiseringsdato</div>
        <div class="col-3">Frist</div>
        <div class="col-3">Annonsenummer</div>
        <div class="col-2">
        <a class="btn btn-info" data-toggle="collapse" href="#jobbio" role="button"
              aria-expanded="false">Se detaljer...</a>
        </div>
    </div>
    <div class="row">
    <div class="overflow-auto collapse" id="jobbio" style="height: 200px">
              <p class="card-text">Lorem ipsum osv</p>
              <button class="btn btn-info">Søk Jobb</button>
            </div>
    </div>
</div>

<script>
    
</script>            </div>


        </div>

    </div>
    <script src="js\script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>