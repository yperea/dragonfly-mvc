<main role="main">

    <div class="jumbotron p-4 p-md-5 text-white" style="background-image: url('/<?=APP_HOST?>public/content/img/avi-richards-1900x600.jpg')">
        <div class="col-md-6 px-0">
            <h1 class="display-3"><?= $this->title ?></h1>
            <p class="lead my-3">Custom Made Bracelets with Exceptional Gemstones from Ancient Times, made for women who have a desire for success, ambition, strength, and motivation.</p>
        </div>
    </div>
    <br/>
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
