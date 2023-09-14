<?php include "components/header.php" ?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Lag ny jobb</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Navn</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-post</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passord</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gjenta passord</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Jeg vil registrere meg som arbeidsgiver</label>
                </div>
                <button type="submit" class="btn btn-success">Registrer meg</button>
                <button type="submit" class="btn btn-danger">Avbryt</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php include "components/footer.php" ?>