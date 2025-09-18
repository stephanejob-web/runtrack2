<?php
function longueurChaine($chaine)
{
    $count = 0;
    for ($i = 0; isset($chaine[$i]); $i++) {
        $count++;
    }
    return $count;
}
