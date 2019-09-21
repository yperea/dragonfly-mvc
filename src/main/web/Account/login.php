<?php
    $model = $this->model;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/<?=APP_HOST?>public/content/img/favicon.ico">
    <title>Login</title>
    <!-- Bootstrap validator CSS -->
    <link rel="stylesheet" type="text/css" href="/<?=APP_HOST?>public/content/css/form-validation.css" />
    <!-- Bootstrap Signin CSS -->
    <link rel="stylesheet" type="text/css" href="/<?=APP_HOST?>public/content/css/signin.css" />
    <!-- DragonFly local Style Sheet -->
    <link rel="stylesheet" type="text/css" href="/<?=APP_HOST?>public/content/css/main.css" />

    <?php require_once(VIEWS_PATH . "shared/meta.php"); ?>
    <?php require_once(VIEWS_PATH . "shared/cdn-css.php"); ?>

</head>

<body class="text-center">


<form class="form-signin needs-validation"
      method="POST"
      action=""
      novalidate >

    <img class="mb-4" src="/<?=APP_HOST?>public/content/img/dragonfly_logo75x75.png" alt="" width="72" height="72">
    <h1 class="lh-condensed h3 mb-3 font-weight-normal">Please sign in</h1>

    <?= $this->displayMessages() ?>

    <label for="username" class="sr-only">Username</label>
    <input type="text"
           class="form-control"
           id="username"
           name="username"
           placeholder="Enter your username"
           value="<?=isset($model)? $model->getUsername() : "";?>"
           required autofocus>
    <small class="text-muted"></small>
    <div class="invalid-feedback" style="width: 100%;">
        Please enter a username.
    </div>

    <label for="password" class="sr-only">Password</label>
    <input type="password"
           class="form-control"
           id="password"
           name="password"
           placeholder="Password"
           value=""
           maxlength="30"
           required />
    <div class="invalid-feedback">
        Please enter your password.
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>

    <p class="mt-5 mb-3 text-muted">Don't have an account?
        <a href="/<?=APP_HOST?>Account/signup">Sign Up</a> | <a href="/<?=APP_HOST?>">Home</a> <br/>
    </p>
</form>

<?php require_once(VIEWS_PATH . "shared/cdn-js.php"); ?>

<!-- Bootstrap Core JavaScript -->
<script src="/<?=APP_HOST?>public/content/js/holder.min.js"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
</html>
