<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/css.css">
    <title>Best sellers - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"

    >
</head>
<body class="d-flex flex-column min-vh-100">

<div  style="background-color:rgb(64,224,208); text-align:center; height:100px">
    <h1>Bienvenue sur le site des meilleurs ventes de livres</h1>
</div>

        <h3>Informations : </h3>

    <div id="contenu">
        <?php include_once('includes/pdo.php'); 
            foreach ($books as $book) {
                ?>
                    <p><?php echo "Titre  : " .$book['title']; ?></p>
                    <p><?php echo "Author : " .$book['author']; ?></p>
                    <p><?php echo "Extrait : " .$book['resume']; ?></p>
                    <p><?php echo "Année de sortie : " .$book['year']; ?></p>
                    <br>
                <?php
                }
            ?>
       
    </div>


<footer id="footer">
<?php 
    // la boucle pour afficher les elements page par page
    for($i=1; $i<=$pagesCount; $i++)
        echo "<a href='?page=$i'> $i </a>&nbsp &nbsp";
?>  
</body>
</html>