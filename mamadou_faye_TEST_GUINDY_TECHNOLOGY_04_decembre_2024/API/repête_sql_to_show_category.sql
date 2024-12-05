SELECT 
    c.id AS categorie_id,
    c.nom AS categorie_nom,
    c.description AS categorie_description,
    c.niveau AS categorie_niveau,
    IFNULL(parent.nom, 'Null') AS parent_nom,
    COUNT(p.id) AS nombre_de_produits
FROM 
    categories c
LEFT JOIN 
    categories parent ON c.parent_id = parent.id
LEFT JOIN 
    produits p ON p.categorie_id = c.id 
GROUP BY 
    c.id, c.nom, c.description, c.niveau, parent.nom
ORDER BY 
    c.niveau, c.nom;
