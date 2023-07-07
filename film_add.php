<?php
require './partials/header.php'; 
require './config/movie_model.php';

$categories = getAllCategories();
$ext = ".jpg, .jpeg, .jpe, .jif, .jfif,	.png";
$data = $_GET['date'] ?? null;


?>

    <div class="container">

        <div class="row mb-3">
            <span> <a href="films.php">Films</a> / Ajout</span>
        </div>

        <div class="row">
            <h1>Ajouter un film</h1>
            <form class="row g-3 needs-validation" action="upload.php">

                <div class="col-12">
                    <label class="form-label" for="title"> Titre </label>
                    <input class="form-control" type="text" name="title" id="title" required>
                </div>

                <div class="col-12">
                    <label class="form-label col-12" for="date"> Date de sortie</label>
                    <input class="form-control" type="date" name="date" id="date" required>
                </div>

                <div class="col-12">
                    <label class="form-label" for="synop"> Description</label>
                    <textarea class="form-control" type="text" name="synop" id="synop" rows="3"></textarea>
                </div>

                <div class="col-12">
                    <label class="form-label" for="duration"> Durée </label>
                    <input class="form-control" type="number" min="1" max="999" name="duration" id="duration" list required>
                </div>

                <div class="col-12">
                    <label class="form-label" for="cover"> Cover </label>
                    <input class="form-control" type="file" name="cover" id="cover" accept="<?= $ext ?>" required>
                </div>

                <div class="col-12">
                    <label class="form-label" for="catg"> Catégorie </label>
                    <select class="form-select" name="catg" id="catg" required>
                        <option selected disabled value="">Sélectionnez une catégorie </option>
                        <?php
                            foreach($categories as $category){
                        ?>
                            <option value="<?= $category['name']?>"><?= $category['name']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="input-group col-12">
                    <button class="btn btn-primary" type="submit"> Ajouter </button>
                </div>
            </form>
        </div>
    </div>
<?php
    require './partials/footer.php';
?>