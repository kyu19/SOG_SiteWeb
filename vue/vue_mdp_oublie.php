<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background-color: #e3f2fd;">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center mb-3">
                    Mot de passe oublié
                </h3>
            </div>
            <div class="card-body ">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="email" class="form-label">Votre Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="reset" class="btn btn-danger me-2">Annuler</button>
                        <button type="submit" name="submit" class="btn btn-success">Valider</button>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="index.php?page=0">Lien vers l'accueil</a>
					</div>
                </form>
                <p>
                    <?php if (isset($erreur)) { echo "<font color = 'red'>" . $erreur . "</font>"; } ?>
                </p>
            </div>
        </div>
    </div>

<style>
/*css des lien a*/
a {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

a:hover, a:focus {
  text-decoration: none;
}

body {
    background-image: linear-gradient(-225deg, #7DE2FC 0%, #B9B6E5 100%);

}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>