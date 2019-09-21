<?php
$title = "DragonFly - Sign Up";
require_once(VIEWS_PATH . "shared/header.php");
$model = $this->model;
?>

<div class="row">
    <div class="col-md-12 order-md-1">
        <?php if (!empty($messages)) : ?>
            <div class="alert alert-warning" role="alert">
                <ul>
                    <?php foreach ($messages as $message) : ?>
                        <li><?= $message;?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;?>

        <form class="needs-validation"
              method="post"
              action=""
              novalidate>

            <?= $this->displayMessages() ?>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text"
                       class="form-control"
                       id="email"
                       name="email"
                       value="<?=isset($model)? $model->getEmail() : "";?>"
                       required />
                <div class="invalid-feedback" style="width: 100%;">
                    Please enter an email.
                </div>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text"
                       class="form-control"
                       id="username"
                       name="username"
                       value="<?=isset($model)? $model->getUsername() : "";?>"
                       required />
                <div class="invalid-feedback" style="width: 100%;">
                    Please enter a username.
                </div>

            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       required />
                <div class="invalid-feedback" style="width: 100%;">
                    Please enter a password.
                </div>
            </div>

            <div class="mb-3">
                <label for="password2">Password Confirmation</label>
                <input type="password"
                       class="form-control"
                       id="password2"
                       name="password2"
                       required />
                <div class="invalid-feedback" style="width: 100%;">
                    Please enter the password confirmation.
                </div>
            </div>

            <br />
            <button class="btn btn-primary btn-lg btn-block"
                    type="submit"
                    name="submit">Sign Up</button>
        </form>
    </div>
</div>

<?php
require_once (VIEWS_PATH . "shared/footer.php");
?>
