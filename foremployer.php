<?php include "components/header.php" ?>
<div class="container">
    <h1>Finn kandidater</h1>
    <div class="row mt-3">
        <div class="col">
            <input type="text" class="form-control" id="searchText" aria-describedby="searchText" placeholder="Søk i fritekst (eks: 1,2,3)">
        </div>
        <div class="col">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Kompetanse</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="col">
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option selected>Sted</option>
                <option value="1">Bergen</option>
                <option value="2">Kristiansand</option>
                <option value="3">Oslo</option>
            </select>
        </div>
        <div class="col">
            <button type="submit" class="search-button">Søk</button>
        </div>
        <div class="col"></div>
    </div>
    <?php include "components/candidateslist.php" ?>
    <?php include "components/candidateslist.php" ?>
    <?php include "components/candidateslist.php" ?>
    <?php include "components/candidateslist.php" ?>


</div>
<?php include "components/footer.php" ?>
</div>