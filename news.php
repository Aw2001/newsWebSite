<?php
    // Connexion à la base de données MySQL
    $servername = "localhost";
    $username = "mglsi_user";
    $password = "passer";
    $dbname = "mglsi_news";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Obtention de la catégorie à partir de l'URL
    $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : '';

    // Modifier la requête SQL pour récupérer seulement les actualités de la catégorie spécifiée
    if ($categorie) {
        $sql = "SELECT article.titre, article.contenu, categorie.libelle FROM article INNER JOIN categorie ON article.categorie = categorie.id WHERE categorie.libelle = '$categorie'";
    } else {
        $sql = "SELECT article.titre, article.contenu, categorie.libelle FROM article INNER JOIN categorie ON article.categorie = categorie.id";
    }
    $result = $conn->query($sql);
   
    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2>ACTUALITES POLYTECHNICIENNES</h2>
        <nav>
            <ul>
                <li><a href="news.php">Actualités</a></li>
                <li><a href="?categorie=sport">Sport</a></li>
                <li><a href="?categorie=sante">Santé</a></li>
                <li><a href="?categorie=education">Education</a></li>
                <li><a href="?categorie=politique">Politique</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Contenu des actualités -->
        <div class="news-container">
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='news-item'>";
                    echo "<h2>" . $row["titre"] . "</h2>";
                    echo "<p>" . $row["contenu"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 résultats";
            }
        ?>
            <!-- Ajoutez d'autres actualités ici -->
        </div>
    </main>
</body>
</html>
