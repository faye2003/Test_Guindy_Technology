CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    description VARCHAR(255),
    prix DECIMAL(10, 2) NOT NULL,
    categorie_id INT NOT NULL,
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

-- insert catyegory pour l'ajout du product sans parent
INSERT INTO categories (nom, description, niveau, parent_id)
VALUES ('Catégorie principale', 'Description de la catégorie principale', 0, NULL);

-- insert product
INSERT INTO produits (nom, description, prix, categorie_id)
VALUES ('Produit 1', 'Description du produit 1', 25.50, 1);
