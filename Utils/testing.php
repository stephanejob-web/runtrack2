<?php
class User
{
    public $firstname;
    public $lastname; 
    public $age;

    function __construct($firstname, $lastname, $age)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
    }

    function get_presentation(): string
    {
        return "bonjour je m'appelle" . " " . $this->firstname . " " . $this->lastname . " " . " et j'ai " . $this->age . " " . "ans";
    }

    function get_age(): int
    {
        return $this->age;
    }
}

$user1 = new User("stephane", "bob", "51");
$user2 = new User("laurent", "botta", "48");
$user3 = new User("john", "doe", "65");
$users = [$user1, $user2,$user3];
?>

<!doctype html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<table>
    <caption>
     Liste des utilisateurs
    </caption>
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Age</th>
    </tr>
    </thead>

    <?php
    foreach ($users as $user) {
        echo "<tbody>";
        echo "<td>" . $user->lastname . "</td>";
        echo "<td>" . $user->firstname . "</td>";
        echo "<td>" . $user->age . "</td>";

        echo "</tbody>";
    }
    ?>
</table>

</body>
</html>
