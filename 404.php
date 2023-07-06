<?php 
    require './partials/header.php'; 
    require './config/movie_model.php';

    $movies = getAllMovies();

    
    $rng = rand(2, 4);
    shuffle($movies);
?>

    <div class="container">
        <div class="row">
            <h1> 404  - ¯\_(ツ)_/¯</h1>
            <p>Pour nous faire pardonner, on vous propose <strong> <?= $rng ?> </strong> films à regarder</p>
        </div>
        <div class="row">
        <?php for($i = 0; $i < $rng; $i++){ ?>
            <div class="col-lg-3">

            <div class="card">
            <a href="film.php?id=<?= $movies[$i]['id'] ?>">
                <img src="uploads/<?= $movies[$i]['cover']; ?>" class="card-img-top cover" alt="<?= $movies[$i]["title"] ?>">
                <div class="card-body">
                <h5 class="card-title"><?= $movies[$i]['title']; ?> </h5>  
                </div>
            </a>
            </div>  
            
        </div>
        <?php } ?>
        </div>
    </div>

<?php
    require './partials/footer.php';
?>