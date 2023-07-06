<?php

/**
 * Script qui permet d'importer un CSV dans une base de données
 */

// Ouvrir le fichier
$file = fopen('./exports/categories.csv', 'r');


$categories = [];
$count = 0;

// On va parcourir le fichier ligne par ligne
while ($line = fgetcsv($file, null, ';')) {
    if ($count++ === 0) {
        continue; // On passe la première ligne du CSV
    }

    $categories[] = [
        'name' => $line[1],
    ];
}

// Connexion à la BDD pour importer les catégories
require 'config/functions.php';

// Clean de la table avant l'import
db()->query('
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE actor;
TRUNCATE movie;
TRUNCATE category;
TRUNCATE jouer;
SET FOREIGN_KEY_CHECKS = 1;
');

foreach ($categories as $category) {
    $query = db()->prepare('INSERT INTO category (name) VALUES (:name)');
    $query->execute($category); //->execute(['name' => 'Action']);
}

//-------------------------------------------------------------------------
//Technique pour ajouter les colonnes via des variables => dynamique
$movies = convertCsvToArray('./exports/movies.csv');

foreach ($movies as $movie) {
    unset($movie['id_movie']); // Cette colonne ne sert pas
    $query = db()->prepare('INSERT INTO movie (title, released_at, description, duration, cover, id_category) VALUES (:title, :released_at, :description, :duration, :cover, :id_category)');
    $query->execute($movie);
}

//-------------------------------------------------------------------------
//Ajout des colonnes via une fonction (methode d'au dessus) => on évite la répétition
$actors = convertCsvToArray('./exports/actors.csv');

foreach ($actors as $actor) {
    unset($actor['id_actor']);
    $query = db()->prepare('INSERT INTO actor (name, firstname, birthday) VALUES (:name, :firstname, :birthday)');
    $query->execute($actor);
}

$movieActors = convertCsvToArray('./exports/jouer.csv');

foreach ($movieActors as $movieActor){
    $query = db()->prepare('INSERT INTO jouer (id, id_movie) VALUES (:id_actor, :id_movie)');
    $query->execute($movieActor);
}

echo 'Données importées';
