<?php
session_start();

require_once '../app/models/Product.php';

require_once '../app/controllers/ProductController.php';

// Configuration de la base de donnees
$dbHost = "localhost";
$dbName = "produit_db";
$dbUser = "root";
$dbPass = "";

try {
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Instancier le controleur et executer les actions
    $productController = new ProductController($db);
    // Les routes
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'create':
                $productController->create();
                break;
            case 'store':
                $productController->store();
                break;
            case 'edit':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $productController->edit($id);
                }
                break;
                case 'update':
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $productController->update($id);
                        }
                        break;
                    
                        case 'delete':
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $productController->delete($id);
                            }
                            break;
                        
            default:
                $productController->index();
        }
    } else {
        $productController->index();
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

