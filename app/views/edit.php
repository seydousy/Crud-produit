<!DOCTYPE html>
<html>
<head>
    <title>Modifier un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier un produit</h1>
        <form method="post" action="../public/index.php?action=update&id=<?= $product['id'] ?>">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?= $product['nom'] ?>">
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="number" id="prix" name="prix" class="form-control" step="0.01" value="<?= $product['prix'] ?>">
            </div>
            <div class="form-group">
                <label for="quantite">Quantité :</label>
                <input type="number" id="quantite" name="quantite" class="form-control" value="<?= $product['quantite'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>
