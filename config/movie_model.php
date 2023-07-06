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
    function isIdExist($id, $table){
        $sql = "SELECT * 
                FROM $table 
                WHERE EXISTS (
                    SELECT * 
                    FROM $table 
                    WHERE id = :id
                );
        ";
        $query = db()->prepare($sql);
        $query->execute([$id]);
        $movie = $query->fetch();
    }

    ?>