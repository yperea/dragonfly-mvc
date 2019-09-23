<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/<?=APP_HOST?>">DRAGONFLY Creations</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/<?=APP_HOST?>product/collection">Collection</a>
            </li>

            <?php if (isset($_SESSION['username'])) : ?>
                <!--
                <li class="nav-item active">
                    <a class="nav-link" href="/<?/*=APP_HOST*/?>">Home <span class="sr-only">(current)</span></a>
                </li>
                -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/<?=APP_HOST?>product/list"" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product Manager</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown08">
                        <a class="dropdown-item" href="/<?=APP_HOST?>product/list">Product List</a>
                        <a class="dropdown-item" href="/<?=APP_HOST?>product/new">New Product</a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Right menu navigation bar -->
        <ul class="navbar-nav justify-content-end">
            <?php if (!isset($_SESSION['username'])) : ?>
                <li class="nav-item"><a class="nav-link" href="/<?=APP_HOST."account"?>/signup"> Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="/<?=APP_HOST."account"?>/login"> Login</a></li>
            <?php else : ?>
                <li class="nav-item"><a class="nav-link" href="/<?=APP_HOST."account"?>/logout"> Log Out (<?= isset($_SESSION['username']) ? $_SESSION['username'] : "..."?>)</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
