<?php include "components/header.php" ?>
<div class="container">
    <div class="row">
        <h1>Finn din nye jobb!</h1>
    </div>
    <div class="row">
        <div class="col-4">
        <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
        </div>
        <div class="col-3">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Bransje</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-3">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Sted</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-info">Søk</button>
        </div>
    </div>
    <?php include "components/job_small.php"?>
    <?php include "components/job_small.php"?>
    <?php include "components/job_small.php"?>
    <?php include "components/job_small.php"?>
</div>
<?php include "components/footer.php" ?>