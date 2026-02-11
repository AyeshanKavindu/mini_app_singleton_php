<?php

require_once "classes/Database.php";
require_once "classes/Product.php";

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $product = Product::findOneById($id);
}

require_once "templates/header.php";
?>

<section>
        <?php if (isset($product) && $product):?>

            <?php /** @var Product $product */ ?>
            <h1><?=htmlentities($product->getName()); ?></h1>
            <h2><?=htmlentities($product->getPrice()); ?></h2>
            <p><?=htmlentities($product->getDescription())?></p>

        <?php else: ?>
            <h1>Product not found</h1>
        <?php endif; ?>
</section>
<?php require_once "templates/footer.php";
