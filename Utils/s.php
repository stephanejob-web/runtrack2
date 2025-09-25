
<?php
function inverseBool($valeur) {
return !$valeur;
}

// Exemple d'utilisation
$tour = true;
$tour = inverseBool($tour);
$tour = inverseBool($tour);
echo $tour ? 'true' : 'false';