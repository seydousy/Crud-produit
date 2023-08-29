<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Ajouter un produit</h1>
        <form method="post" action="../public/index.php?action=store">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" class="form-control" step="0.01">
            </div>
            <div class="form-group">
                <label for="quantite">Quantité :</label>
                <input type="number" id="quantite" name="quantite" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>

