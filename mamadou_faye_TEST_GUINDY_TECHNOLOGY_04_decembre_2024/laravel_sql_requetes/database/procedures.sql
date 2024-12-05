SELECT A.id, A.designation, IFNULL(SUM(B.montant), 0) AS total_montant
FROM A
LEFT JOIN B ON A.id = B.tablea_id
GROUP BY A.id, A.designation
HAVING total_montant > 0;
