<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
       
        <h1>Liste des produits</h1>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['message'] ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <a href="index.php?action=create" class="btn btn-primary mb-3">Ajouter un produit</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['nom'] ?></td>
                        <td><?= $product['prix'] ?></td>
                        <td><?= $product['quantite'] ?></td>
                        <td>
                        <a href="../public/index.php?action=edit&id=<?= $product['id'] ?>" class="btn btn-sm btn-info">Modifier</a>
                        <a href="../public/index.php?action=delete&id=<?= $product['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
