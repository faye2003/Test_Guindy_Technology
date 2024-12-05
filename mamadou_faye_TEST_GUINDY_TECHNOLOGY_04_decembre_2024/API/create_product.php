<?php

$conn = new mysqli("127.0.0.1", "root", "", "database_product");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createProduct($nom, $description = NULL, $prix, $categorie_id) {
    global $conn;

    $result = $conn->query("SELECT id FROM categories WHERE id = $categorie_id");
    if ($result->num_rows == 0) {
        echo "Erreur : La catégorie spécifiée n'existe pas.";
        return;
    }

    $exec = $conn->prepare("INSERT INTO produits (nom, description, prix, categorie_id) VALUES (?, ?, ?, ?)");
    $exec->bind_param("ssdi", $nom, $description, $prix, $categorie_id);
    
    if ($exec->execute()) {
        echo "Produit créé avec success.";
    } else {
        echo "Erreur : " . $exec->error;
    }

    $stmt->close();
}

createProduct('Produit Exemple', 'Description du produit', 19.99, 1);
?>
