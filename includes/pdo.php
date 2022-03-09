<?php

// Connecter php à mysql, si ceci ne fonctionne pas renvoyer un message d'erreur
try
{
	$mysqlClient = new PDO('mysql:host=localhost;dbname=my_database;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Calculer le nombre de nos livres, en comptant le nombre d'id.
$sqlQuery = 'select count(id) as compt from books';  // la requete sql
$count = $mysqlClient->prepare($sqlQuery); 
$count->execute(); 	
$booksCount = $count->fetchAll();

// Mise en place de la pagination
$page = $_GET["page"];
$elementsPerPage = 1;  // Mettre qu'un seul element dans la page (un livre par page)
$pagesCount=ceil($booksCount[0]["compt"]/$elementsPerPage);  // pagesCount est le nombre de page qu'on va avoir -  ceil permet d'arrondir le nombre pour un avoir un nombre entier
$start = ($page-1) * $elementsPerPage;  // l'element par lequel commencer


// On récupère tout le contenu de la table books
$sqlQuery = 'SELECT * FROM books limit :start,:elementsPerPage';
$booksStatement = $mysqlClient->prepare($sqlQuery);
$booksStatement->bindValue('elementsPerPage',$elementsPerPage,PDO::PARAM_INT);
$booksStatement->bindValue('start',$start,PDO::PARAM_INT);
$booksStatement->execute();
$books = $booksStatement->fetchAll();
?>