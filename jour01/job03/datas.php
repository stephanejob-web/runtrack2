<?php
$type = [
    [
        "type" => "bool",
        "description" => "Valeur booléenne : true ou false.",
        "exemple" => "true, false"
    ],
    [
        "type" => "int",
        "description" => "Nombres entiers (positifs ou négatifs).",
        "exemple" => "42, -7, 2025"
    ],
    [
        "type" => "float (double)",
        "description" => "Nombres à virgule flottante (décimaux).",
        "exemple" => "3.14, -0.5, 2.0"
    ],
    [
        "type" => "string",
        "description" => "Chaînes de caractères (texte).",
        "exemple" => "\"Bonjour\", \"PHP 8\", 'Hello World'"
    ],
    [
        "type" => "array",
        "description" => "Tableaux indexés ou associatifs.",
        "exemple" => "[1, 2, 3], ['nom' => 'Laurent', 'age' => 40]"
    ],
    [
        "type" => "object",
        "description" => "Instance d'une classe.",
        "exemple" => "new DateTime(), new stdClass()"
    ],
    [
        "type" => "callable",
        "description" => "Fonction ou méthode qui peut être appelée.",
        "exemple" => "'strlen', function(\$x) { return \$x * 2; }"
    ],
    [
        "type" => "iterable",
        "description" => "Valeur pouvant être parcourue avec foreach (array ou objet Traversable).",
        "exemple" => "[1,2,3], new ArrayIterator([\"a\", \"b\"])"
    ],
    [
        "type" => "NULL",
        "description" => "Représente l'absence de valeur (null).",
        "exemple" => "null"
    ],

    // Pseudo-types
    [
        "type" => "mixed",
        "description" => "Peut accepter plusieurs types différents.",
        "exemple" => "42, \"texte\", [1,2,3], null"
    ],
    [
        "type" => "number",
        "description" => "Pseudo-type : entier (int) ou flottant (float).",
        "exemple" => "10, 3.14"
    ],
    [
        "type" => "resource",
        "description" => "Référence à une ressource externe (fichier, connexion, etc.).",
        "exemple" => "fopen('test.txt', 'r')"
    ],
    [
        "type" => "void",
        "description" => "Indique qu'une fonction ne retourne aucune valeur.",
        "exemple" => "function logMessage(string \$msg): void { echo \$msg; }"
    ],
    [
        "type" => "false",
        "description" => "Valeur false uniquement (souvent comme valeur de retour d'erreur).",
        "exemple" => "strpos('abc', 'z') // retourne false"
    ],
    [
        "type" => "true",
        "description" => "Valeur true uniquement (depuis PHP 8.2).",
        "exemple" => "function alwaysTrue(): true { return true; }"
    ],
    [
        "type" => "never",
        "description" => "Indique qu'une fonction ne retourne jamais (ex : exit(), throw).",
        "exemple" => "function stop(): never { exit('Fin'); }"
    ]
];


