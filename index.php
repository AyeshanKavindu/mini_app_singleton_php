<?php

require_once "classes/Database.php";
require_once "classes/Movie.php";


$movies = Movie::findAll();

require_once "templates/header.php";
?>


<h1>Mini PHP App with classes</h1>
<section>
    <?php foreach ($movies as $movie): ?>
        <article>
            <?php /** @var Movie $movie */ ?>
            <h2><?= htmlentities($movie->getTitle()); ?></h2>
            <p>
                <a href="movie_detail.php?id=<?= htmlentities($movie->getId()); ?>">
                    Read More
                </a>
            </p>
        </article>
    <?php endforeach; ?>
</section>
<?php require_once "templates/footer.php";
