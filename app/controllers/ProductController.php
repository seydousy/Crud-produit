<?php

require_once __DIR__ . '/../models/Product.php';


class ProductController {
    private $productModel;

    public function __construct(PDO $db) {
        $this->productModel = new Product($db);
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        require_once __DIR__ . '/../views/index.php';

    }

    public function create() {
        require_once __DIR__ . '/../views/create.php';

    }

    public function store() {
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];
        
        if ($this->productModel->createProduct($nom, $prix, $quantite)) {
            $_SESSION['message'] = "Produit ajouté avec succès.";
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout du produit.";
        }
        
        header ("Location: ../public/index.php");

    }

    public function edit($id) {
        $product = $this->productModel->getProductById($id);
        require_once __DIR__ . '/../views/edit.php';
    }

    public function update($id) {
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];
        
        if ($this->productModel->updateProduct($id, $nom, $prix, $quantite)) {
            $_SESSION['message'] = "Produit mis à jour avec succès.";
        } else {
            $_SESSION['message'] = "Erreur lors de la mise à jour du produit.";
        }
        
        header ("Location: ../public/index.php");
    }

    public function delete($id) {
        if ($this->productModel->deleteProduct($id)) {
            $_SESSION['message'] = "Produit supprimé avec succès.";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression du produit.";
        }
        header ("Location: ../public/index.php");
    }
}
?>




