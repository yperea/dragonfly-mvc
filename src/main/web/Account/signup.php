<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="/<?=APP_HOST?>public/content/img/dragonfly_logo75x75.png"
             alt="Dragonfly Logo" width="72" height="72" />
        <h2>Sign Up</h2>
        <p class="lead">Registration is easy.</p>
    </div>

<div class="row">
    <div class="col-md-12 order-md-1">
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
                       value="<?=isset($this->model)? $this->model->getEmail() : "";?>"
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
                       value="<?=isset($this->model)? $this->model->getUsername() : "";?>"
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
</div>
