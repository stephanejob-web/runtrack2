<?php
$FetchAllStudent = "SELECT id, prenom, nom, naissance, sexe, email FROM etudiants";
$GetRoomsNameAndCapacity = "SELECT nom, capacite FROM salles";
$GetStudentLastNameFirsNameBirthday = "select prenom,nom,naissance from etudiants;";
$GetStudentLastmajeur = "select * from etudiants where YEAR(CURRENT_DATE) - YEAR(naissance) < 18";
$countStudent =" SELECT count(*) FROM etudiants;";
$etageSuperficie =" SELECT SUM(superficie) AS superficie_totale FROM etage;";
$salleCapacity = "SELECT SUM(capacite) AS capacite_totale FROM salles;";
$salleCapacityDesc = "SELECT * FROM salles ORDER BY capacite DESC;";
$salleCapacityAsc = "SELECT * FROM salles ORDER BY capacite ASC;";
$salleCapacityMoy = "SELECT AVG(capacite) AS capacite_moyenne FROM salles;";
$FetchStudentsByBirthYearRange  = "SELECT prenom, nom, naissance FROM etudiants
WHERE YEAR(naissance) BETWEEN 1998 AND 2018;";
$nameSalleNameEtage="SELECT salles.nom AS nom_salle, etage.nom AS nom_etage FROM salles JOIN etage";

