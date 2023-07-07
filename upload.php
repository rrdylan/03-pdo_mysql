<?php
require './partials/header.php';
require './config/movie_model.php';

$data = $_GET;
$request;

try {
    $idCatg = getCategory($data['catg'])['id'] ?? null;
    $request = addMovie($data['title'], $data['date'], $data['synop'], $data['duration'], $data['cover'], $idCatg);
}
catch( PDOException $e){
    $error = "Echec de l'ajout : ";
    $class = "bg-danger";
    $emote = "(╯°□°）╯︵ ┻━┻";
    $error_details = $e->getCode();
}

$emote = $emote ?? "(☞ﾟヮﾟ)☞   ☜(ﾟヮﾟ☜)";
$message = $error ?? " Ajouté avec succés <br>".$emote;
$class =  $class ?? "bg-success bg-gradient";

header('refresh: 5; url=./film_add.php');
?>

<div class="container">

    <div class="row mb-3 justify-content-start">
        <h1> Redirection dans... <span id="time">5</span></h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card <?= $class ?> text-center p-3">
                <h2> <?= $message ?>  </h2>
                    <?php
                        if(isset($error)) {
                    ?>
                    <h4> Erreur - <?= $error_details ?> </h4>
                    <p></p>
                    <?php
                        }
                    ?>
            </div>
        </div>
    </div>
</div>

<script src="./config/js/upload.js"></script>

<?php require './partials/footer.php' ?>