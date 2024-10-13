<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/Tableform.css">
    <link rel="stylesheet" href="CSS/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $dbname = "base_formulaire";

    $conn = new mysqli($servername, $username, "", $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        http_response_code(500);
        echo "Erreur de connexion à la base de données : " . $conn->connect_error;
        exit;
    }

    // Vérifier si les données sont envoyées en POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Requête d'insertion dans la table "produit"
        $sql = "INSERT INTO produit (name, price, quantity) VALUES ('$productName', $productPrice, $productQuantity)";

        if ($conn->query($sql) === TRUE) {
            http_response_code(200);
            echo "Produit enregistré avec succès !";    

        } else {
            http_response_code(500);
            echo "Erreur lors de l'enregistrement du produit : " . $conn->error;
        }
    } else {
        http_response_code(400);
        echo "Requête invalide.";
    }
    $conn->close();
?>
     <!-- Tableau de valeurs -->
    <table id="tableau2">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
            </tr>
        </thead>
    </table>
    <!-- Bouton pour afficher la fenêtre modale -->
    <button id="myBtn">Ajouter un produit</button>
    <!-- Fenêtre modale -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <h2>Ajouter un produit</h2>
            <form id="product-form">
                <label for="product-name">Nom du produit :</label>
                <input type="text" id="product-name" name="product-name" required>

                <label for="product-price">Prix :</label>
                <input type="number" id="product-price" name="product-price" step="0.01" required>

                <label for="product-quantity">Quantité :</label>
                <input type="number" id="product-quantity" name="product-quantity" required>

                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </div>

<script src="JS/Tableform.js"></script>
</body>
</html>