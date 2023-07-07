    <?php

    function getMovie($id){
            $query = db()->prepare("SELECT * FROM movie WHERE id = ?");
            $query->execute([$id]);
            $movie = $query->fetch();

            return $movie;
    }

    function formatSec($min): string{
        return date("H:i", $min*60);
    }

    function formatReleased($data):array{
        return explode("-", $data);
    }

    function getAllMovies():array{
        $query = db()->prepare("SELECT * FROM movie ");
        $query->execute();
        $movies = $query->fetchAll();
        
        return $movies;
    }

    function getActors($id):array{
        $sql = "SELECT A.*
                FROM jouer AS J
                INNER JOIN actor AS A on J.id = A.id 
                WHERE J.id_movie = ?;
                ";
        $query = db()->prepare($sql);
        $query->execute([$id]);
        $actors = $query->fetchAll();
    
        return $actors;
    }

    function getRNGFilm($limit):array{
        $sql = "SELECT * 
                FROM `movie` 
                ORDER By rand() 
                LIMIT ".$limit.";";
        $query = db()->prepare($sql);
        $query->execute();
        $movie = $query->fetchAll();
        return $movie;
    }   

    function getAllCategories(){
        $query = db()->prepare("SELECT * FROM category ");
        $query->execute();
        $movies = $query->fetchAll();
        
        return $movies;
    }

    function getCategory($name){
        $query = db()->prepare("SELECT id FROM category WHERE name = ?");
        $query->execute([$name]);
        $id = $query->fetch();

        return $id;
    }

    function addMovie($title, $date, $synop, $duration, $cover, $catg){
        $sql = 
            "INSERT INTO `movie`(`title`, `released_at`, `description`, `duration`, `cover`, `id_category`)
            VALUES (?, ?, ?, ?, ?, ?);
            ";
        
        $query = db()->prepare($sql);
        $success = $query->execute([$title, $date, $synop, $duration, $cover, $catg]);
        return $success;
    }

    ?>