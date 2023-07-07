    <?php 
    require './partials/header.php';
    require './config/movie_model.php';

    $movies  = getAllMovies();
    ?>

    <div class="container">
        <div class="row m-3">
            <a class="button" href="film_add.php"><span class="">Ajouter un film</span></a>
        </div>
    <div class="row">
        <?php  foreach($movies as $movie){ ?>
        <div class="col-lg-3">
            <div class="card">
            <a href="film.php?id=<?= $movie['id'] ?>">
                <img src="uploads/<?= $movie['cover']; ?>" class="card-img-top cover" alt="<?= $movie["title"] ?>">
                <div class="card-body">
                <h5 class="card-title"><?= $movie['title']; ?> </h5>  
                </div>
            </a>
            </div>  
            
        </div>
        <?php  } ?>
    </div>
    </div>
    <?php require './partials/footer.php' ?>
