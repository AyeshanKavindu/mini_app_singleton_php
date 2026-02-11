<?php

require_once "classes/Database.php";
require_once "classes/Movie.php";

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $movie = Movie::findOneById($id);
}

require_once "templates/header.php";
?>

<section>
        <?php if (isset($movie) && $movie):?>

            <?php /** @var Movie $movie */ ?>
            <h1><?=htmlentities($movie->getTitle()); ?></h1>
            <h2><?=htmlentities($movie->getSummary()); ?></h2>

        <?php else: ?>
            <h1>Movie not found</h1>
        <?php endif; ?>
</section>
<?php require_once "templates/footer.php";
