-- Requête pour sélectionner le prenom, le nom et la date de naissance des étudiants qui sont nés entre 1998 et 2018

SELECT prenom, nom, naissance FROM etudiants 
WHERE YEAR(naissance) BETWEEN 1998 AND 2018;