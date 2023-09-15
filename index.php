<?php include "components/header.php" ?>
<div class="container">
    <div class="row">
        <h1>Finn din nye jobb!</h1>
    </div>
    <div class="row">
        <div class="col-2">
        <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
        </div>
        <div class="col-2">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Ansettelsesform</option>
                <option value="1">Fulltid</option>
                <option value="2">Deltid</option>
                <option value="3">Freelance</option>
            </select>
        </div>
        <div class="col-2">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Bransje</option>
                <option value="1">IT</option>
                <option value="2">Service</option>
                <option value="3">Annet</option>
            </select>
        </div>
        <div class="col-3">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Sted</option>
                <option value="1">Kristiansand</option>
                <option value="2">Oslo</option>
                <option value="3">Trondheim</option>
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-info">Søk</button>
        </div>
    </div>
    <hr class="my-4">
    <div class="row">
        <div class="col-9">

            <p>Alle ledige stillinger(20000)</p>
        </div>
        <div class="col-3">
        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Filtrer</option>
                <option value="1">Kristiansand</option>
                <option value="2">Oslo</option>
                <option value="3">Trondheim</option>
            </select>
        </div>
    </div>
    <?php include "components/job_small.php"?>
    <?php include "components/job_small.php"?>
    <?php include "components/job_small.php"?>
    <?php include "components/job_small.php"?>
</div>
<?php include "components/footer.php" ?>