-- Requête pour récupérer le nom des salles et le nom de leur étage

SELECT salles.nom AS nom_salle, etage.nom AS nom_etage 
FROM salles 
JOIN etage ON salles.id_etage = etage.id;