SELECT salles.nom AS nom_salle, etage.nom AS nom_etages
FROM salles
JOIN etage ON salles.id_etages = etages.id;

