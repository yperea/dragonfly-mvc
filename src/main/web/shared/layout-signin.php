<!doctype html>
<html lang="en">
<head>
    <title>DRAGONFLY - <?=$this->title?></title>
    <?php require_once(VIEWS_PATH . "shared/meta.php"); ?>
    <?php require_once(VIEWS_PATH . "shared/cdn-css.php"); ?>

    <!-- Bootstrap Signin CSS -->
    <link rel="stylesheet" type="text/css" href="/<?=APP_HOST?>public/content/css/signin.css" />

    <!-- Application local Style Sheet -->
    <link rel="stylesheet" type="text/css" href="/<?=APP_HOST?>public/content/css/main.css" />

</head>
<body class="text-center">
<?php
    require_once($this->viewFile);
    require_once(VIEWS_PATH . "shared/cdn-js.php");
?>
</body>
</html>
