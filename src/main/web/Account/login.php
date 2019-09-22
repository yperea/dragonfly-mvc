<form class="form-signin needs-validation"
      role="form"
      method="POST"
      action=""
      novalidate >

    <img class="d-block mx-auto mb-4" src="/<?=APP_HOST?>public/content/img/dragonfly_logo75x75.png"
         alt="Dragonfly Logo" width="72" height="72" />
    <h1 class="lh-condensed h3 mb-3 font-weight-normal">Please sign in</h1>

    <?= $this->displayMessages() ?>

    <label for="username" class="sr-only">Username</label>
    <input type="text"
           class="form-control"
           id="username"
           name="username"
           placeholder="Username"
           value="<?=isset($this->model)? $this->model->getUsername() : "";?>"
           required autofocus />
    <small class="text-muted"></small>
    <div class="invalid-feedback" style="width: 100%;">
        Please enter a username.
    </div>

    <div class="mb-3">
        <label for="password" class="sr-only">Password</label>
        <input type="password"
               class="form-control"
               id="password"
               name="password"
               placeholder="Password"
               maxlength="30"
               required />
        <div class="invalid-feedback" style="width: 100%;">
            Please enter your password.
        </div>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>

    <p class="mt-5 mb-3 text-muted">Don't have an account?
        <a href="/<?=APP_HOST?>Account/signup">Sign Up</a> | <a href="/<?=APP_HOST?>">Home</a> <br/>
    </p>
</form>
