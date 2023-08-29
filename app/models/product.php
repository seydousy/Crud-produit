<?php

class Product {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $query = "SELECT * FROM produit";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $query = "SELECT * FROM produit WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct($nom, $prix, $quantite) {
        $query = "INSERT INTO produit (nom, prix, quantite) VALUES (:nom, :prix, :quantite)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
        $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateProduct($id, $nom, $prix, $quantite) {
        $query = "UPDATE produit SET nom = :nom, prix = :prix, quantite = :quantite WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
        $stmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
        
        try {
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour du produit : " . $e->getMessage();
            return false;
        }
    }
    

    public function deleteProduct($id) {
        $query = "DELETE FROM produit WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        try {
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression du produit : " . $e->getMessage();
            return false;
        }
    }
    
}
?>

