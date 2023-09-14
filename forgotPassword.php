<?php include "components/header.php" ?>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Glemt passord?</h1>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Skriv inn din email:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <button type="submit" class="btn btn-success" href="index.php">Tilbakestill Passord</button>
                <a href="login.php" class="btn btn-danger">Tilbake</a>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php include "components/footer.php" ?>