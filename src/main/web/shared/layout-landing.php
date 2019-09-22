<!doctype html>
<html lang="en">
<head>
    <title>DRAGONFLY - <?=$this->title?></title>
    <?php require_once(VIEWS_PATH . "shared/meta.php"); ?>
    <?php require_once(VIEWS_PATH . "shared/cdn-css.php"); ?>

    <!-- Bootstrap Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="/<?=APP_HOST?>public/content/css/carousel.css" />

</head>
<body class="bg-light">
<main role="main">
<?php
    require_once(VIEWS_PATH . "shared/top-bar.php");
    require_once($this->viewFile);
?>
</main><!-- /.main -->
<?php
    require_once (VIEWS_PATH . "shared/footer.php");
    require_once(VIEWS_PATH . "shared/cdn-js.php");
?>
</body>
</html>
