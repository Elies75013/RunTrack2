SELECT etage.nom AS nom_etages, salles.nom AS "Biggest Room", salles.capacite
FROM salles
JOIN etage ON salles.id_etages = etage.id
WHERE salles.capacite = (
    SELECT MAX(capacite) FROM salles
);

