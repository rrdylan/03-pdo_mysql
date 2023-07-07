<?php 
    require './partials/header.php'; 
    require './config/movie_model.php';

    $movie_id = $_GET['id'];
    $request = getMovie($movie_id);

    if(!$request){
        header("Location: ./404.php");
    }
    
    $actors = getActors($movie_id);
?>
    <div class="container">

        <div class="row mb-3">
            <span> <a href="films.php">Film</a> / <?= $request['title'] ?></span>
        </div>

        <div class="row">
            <div class="col-5">
                <img src="uploads/<?= $request['cover']; ?>" class="rounded poster" alt="<?= $request["title"] ?>">
            </div>
                <div class="col-5">
                    <div class="card p-3">
                    <h3><?= $request['title'] ?></h3>
                    <p> Durée : <?= formatSec($request['duration']) ?> (<?= $request['duration'] ?> minutes)</p>
                    <p> Sortie en cas :<strong> <?= explode("-", $request["released_at"])[0] ?> </strong></p>
                    <p> <?= $request["description"] ?> </p>
                    <?php
                        if( count($actors) > 0){
                    ?>
                        <span> Il y a <?= count($actors) ?> dans ce film </span>
                        <div>
                            <ul class="list-group pt-2">
                            <?php
                                foreach($actors as $actor){
                            ?>
                                <li class="list-group-item"><?= $actor["firstname"]." ". $actor["name"] ?></li>
                            <?php
                                }
                            ?>
                            </ul>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require './partials/footer.php' ?>