<?php
session_start();
include('../cnx.php');

if (!isset($_SESSION['name']) || $_SESSION['user_type'] != 1) {
    header("Location: ../Login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: ../Login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Your Account</title>
    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-lg">

        <h1 class="text-2xl font-bold mb-4">Welcome to Account</h1>

        <?php
        include('../cnx.php');

        if (!$conn) {
            die("La connexion a échoué : " . mysqli_connect_error());
        }

        // Requête pour récupérer la liste des comptes avec les informations de l'utilisateur
        $queryUser = "SELECT user.usersnames as nom, user.passwords
                      FROM user
                      WHERE user.id = '$_SESSION[user_id]'";

        $resultUser = mysqli_query($conn, $queryUser);

        // Vérifier si la requête a réussi
        if ($resultUser) {
            // Afficher la première table avec les informations de l'utilisateur
            echo "<div class='mb-8'>
                  <h2 class='text-xl font-bold mb-2'>User Information</h2>
                  <table class='w-full border'>
                    <thead class='bg-gray-200'>
                        <tr>
                            <th class='py-2 px-4 border'>Username</th>
                            <th class='py-2 px-4 border'>Password</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($rowUser = mysqli_fetch_assoc($resultUser)) {
                echo "<tr>
                        <td class='py-2 px-4 border'>{$rowUser['nom']}</td>
                        <td class='py-2 px-4 border'>{$rowUser['passwords']}</td>
                      </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<p class='text-red-500'>Erreur lors de l'exécution de la requête : " . mysqli_error($conn) . "</p>";
        }

        // Requête pour récupérer les informations de l'adresse de l'utilisateur
        $queryAddress = "SELECT adresse.ville, adresse.quartier, adresse.rue, adresse.code_postal, adresse.email, adresse.telephone
                         FROM user
                         INNER JOIN adresse ON user.adresse_id = adresse.id
                         WHERE user.id = '$_SESSION[user_id]'";

        $resultAddress = mysqli_query($conn, $queryAddress);

        // Vérifier si la requête a réussi
        if ($resultAddress) {
            // Afficher la deuxième table avec les informations de l'adresse
            echo "<div class='mb-8'>
                  <h2 class='text-xl font-bold mb-2'>Address Information</h2>
                  <table class='w-full border'>
                    <thead class='bg-gray-200'>
                        <tr>
                            <th class='py-2 px-4 border'>City</th>
                            <th class='py-2 px-4 border'>District</th>
                            <th class='py-2 px-4 border'>Street</th>
                            <th class='py-2 px-4 border'>Postal Code</th>
                            <th class='py-2 px-4 border'>Email</th>
                            <th class='py-2 px-4 border'>Phone</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($rowAddress = mysqli_fetch_assoc($resultAddress)) {
                echo "<tr>
                        <td class='py-2 px-4 border'>{$rowAddress['ville']}</td>
                        <td class='py-2 px-4 border'>{$rowAddress['quartier']}</td>
                        <td class='py-2 px-4 border'>{$rowAddress['rue']}</td>
                        <td class='py-2 px-4 border'>{$rowAddress['code_postal']}</td>
                        <td class='py-2 px-4 border'>{$rowAddress['email']}</td>
                        <td class='py-2 px-4 border'>{$rowAddress['telephone']}</td>
                      </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<p class='text-red-500'>Erreur lors de l'exécution de la requête : " . mysqli_error($conn) . "</p>";
        }

        // Requête pour récupérer les informations de l'agence de l'utilisateur
        $queryAgence = "SELECT agence.longitude, agence.latitude, agence.adresse
                        FROM user
                        INNER JOIN agence ON user.agence_id = agence.id
                        WHERE user.id = '$_SESSION[user_id]'";

        $resultAgence = mysqli_query($conn, $queryAgence);

        // Vérifier si la requête a réussi
        if ($resultAgence) {
            // Afficher la troisième table avec les informations de l'agence
            echo "<div class='mb-8'>
                  <h2 class='text-xl font-bold mb-2'>Agency Information</h2>
                  <table class='w-full border'>
                    <thead class='bg-gray-200'>
                        <tr>
                            <th class='py-2 px-4 border'>Longitude</th>
                            <th class='py-2 px-4 border'>Latitude</th>
                            <th class='py-2 px-4 border'>Address</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($rowAgence = mysqli_fetch_assoc($resultAgence)) {
                echo "<tr>
                        <td class='py-2 px-4 border'>{$rowAgence['longitude']}</td>
                        <td class='py-2 px-4 border'>{$rowAgence['latitude']}</td>
                        <td class='py-2 px-4 border'>{$rowAgence['adresse']}</td>
                      </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<p class='text-red-500'>Erreur lors de l'exécution de la requête : " . mysqli_error($conn) . "</p>";
        }

        // Requête pour récupérer les informations du compte de l'utilisateur
        $queryAccount = "SELECT account.rib, account.devise, account.balance
                         FROM user
                         INNER JOIN account ON user.id = account.user_id
                         WHERE user.id = '$_SESSION[user_id]'";

        $resultAccount = mysqli_query($conn, $queryAccount);

        // Vérifier si la requête a réussi
        if ($resultAccount) {
            // Afficher la quatrième table avec les informations du compte
            echo "<div class='mb-8'>
                  <h2 class='text-xl font-bold mb-2'>Account Information</h2>
                  <table class='w-full border'>
                    <thead class='bg-gray-200'>
                        <tr>
                            <th class='py-2 px-4 border'>RIB</th>
                            <th class='py-2 px-4 border'>Currency</th>
                            <th class='py-2 px-4 border'>Balance</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($rowAccount = mysqli_fetch_assoc($resultAccount)) {
                echo "<tr>
                        <td class='py-2 px-4 border'>{$rowAccount['rib']}</td>
                        <td class='py-2 px-4 border'>{$rowAccount['devise']}</td>
                        <td class='py-2 px-4 border'>{$rowAccount['balance']}</td>
                      </tr>";
            }

            echo "</tbody></table></div>";
        } else {
            echo "<p class='text-red-500'>Erreur lors de l'exécution de la requête : " . mysqli_error($conn) . "</p>";
        }

        echo "<form method='post' action=''>
                <button type='submit' name='logout' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>
                    Logout
                </button>
              </form>";
        ?>

    </div>

</body>

</html>
