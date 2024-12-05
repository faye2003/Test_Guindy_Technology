<?php
// Fonction pour vérifier si une catégorie est une descendante
function isDescendant($parent_id, $categorie_id, $conn) {
    if ($parent_id === NULL) {
        return false;
    }

    $query = "SELECT parent_id FROM categories WHERE id = ?";
    $exec = $conn->prepare($query);
    $exec->bind_param("i", $parent_id);
    $exec->execute();
    $result = $exec->get_result();
    
    if ($result->num_rows == 0) {
        return false;
    }

    // Vérification le parent
    $parent = $result->fetch_assoc();
    if ($parent['parent_id'] == $categorie_id) {
        return true;
    }

    return isDescendant($parent['parent_id'], $categorie_id, $conn);
}

function createCategory($nom, $description, $parent_id, $conn) {
    if (isDescendant($parent_id, $nom, $conn)) {
        echo "Erreur : La catégorie parente ne peut pas être une descendante de la catégorie en cours.";
        return;
    }

    $exec = $conn->prepare("INSERT INTO categories (nom, description, parent_id) VALUES (?, ?, ?)");
    $exec->bind_param("ciii", $nom, $description, $parent_id);
    
    if ($exec->execute()) {
        echo "Catégorie créée avec succès.";
    } else {
        echo "Erreur : " . $exec->error;
    }

    $stmt->close();
}
?>
