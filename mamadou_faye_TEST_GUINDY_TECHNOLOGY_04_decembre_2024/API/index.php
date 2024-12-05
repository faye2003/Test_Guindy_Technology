<?php
$conn = new mysqli("127.0.0.1", "root", "", "database_product");

if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

function createCategory($nom, $description = NULL, $parent_id = NULL) {
    global $conn;

    if ($parent_id === NULL) {
        $niveau = 0;
    } else {
        $result = $conn->query("SELECT niveau FROM categories WHERE id = $parent_id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $niveau = $row['niveau'] + 1; 
        } else {
            echo "Erreur : La categore parente n'existe pas.";
            return;
        }
    }

    $exec = $conn->prepare("INSERT INTO categories (nom, description, nuveau, parent_id) VALUES (?, ?, ?, ?)");
    $exec->bind_param("ssii", $nom, $description, $niveau, $parent_id);
    
    if ($exec->execute()) {
        echo "Nouvelle catégorie créée avec succès.";
    } else {
        echo "Erreur : " . $exec->error;
    }

    $exec->close();
}

createCategory('Catégorie principale');

createCategory('Sous-catégorie 1', 'Description de la sous-catégorie 1', 1);

createCategory('Sous-sous-catégorie 1', 'Description de la sous-sous-catégorie 1', 2);

?>
