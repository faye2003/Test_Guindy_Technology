CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    description VARCHAR(255),
    niveau INT NOT NULL,
    parent_id INT,
    FOREIGN KEY (parent_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO categories (nom, description, niveau, parent_id)
VALUES ('Catégorie principale', 'Description de la catégorie principale', 0, NULL);

INSERT INTO categories (nom, description, niveau, parent_id)
VALUES ('Sus-catégorie 1', 'Description de la sous-catégorie 1', 1, 1);

INSERT INTO categories (nom, description, niveau, parent_id)
VALUES ('Sous-sous-catégorie 1', 'Description de la sous-sous-catégorie 1', 2, 2);
