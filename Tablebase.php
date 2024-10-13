
<?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_formulaire";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les données de la table
    $sql = "SELECT * FROM produit";
    $result = $conn->query($sql);

    // Afficher les données dans un tableau HTML
    echo "<table class  = 'table table-hover' id='tableau1'>";
    echo "<tr><th>name</th><th>price</th><th>quantity</th></tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"]. "</td><td>" . $row["price"]. "</td><td>" . $row["quantity"]. "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Aucune donnée disponible</td></tr>";
    }

    echo "</table>";
    

    // Fermer la connexion à la base de données
    $conn->close();
?>
