<main role="main">

    <br />

    <div class="container">
        <h1 class="text-center"><?= $this->title ?></h1>
    </div>

    <div class="album text-muted">
        <div class="container">
            <div class="row">
                <?php if($this->model != null): ?>
                <?php foreach ($this->model as $product):?>
                    <div class="card" style="width: 22rem;">
                        <img class="card-img-top"
                             src="/<?=APP_HOST?>public/content/img/products/<?=$product->getImage()?>"
                             alt="<?=$product->getTitle()?> image">
                        <div class="card-body">
                            <h4 class="card-title"><?=$product->getTitle()?></h4>
                            <p class="card-text"><?=$product->getShortDescription()?></p>
                            <a href="details/id=<?=$product->getId()?>" class="btn mybtn">Buy Now</a>
                        </div>
                    </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>
            <?php
            //Generate naviational page links if we have more than one page
/*            if ($numPages > 1) {
                echo getPagination($userSearch, $sort, $curPage, $numPages);
            }*/
            ?>
        </div>
    </div>
</main>
