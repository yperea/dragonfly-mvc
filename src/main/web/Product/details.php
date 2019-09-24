<?php
    $product = $this->model;
?>

<br />

<div class="blog-header">
    <div class="container">
        <h1><?=$product->getTitle();?></h1>
        <!--<p class="lead">Bracelets</p> -->
    </div>
</div>


<main role="main" class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                <img src="<?= !empty($product->getImage()) ?
                         "/" . APP_HOST . "public/content/img/products/" . $product->getImage() :
                         "/" . APP_HOST . "public/content/img/noimage.gif"; ?>"
                     class="rounded img-thumbnail img-fluid"
                     alt="<?=$product->getTitle();?> Image">
            </div>
            <div>
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="blog-post">in
                <h3 class="blog-post-title"><?=$product->getCategory()->getName()?></h3>
                <p class="blog-post-meta">
                    <a href="#"> 0 customer reviews</a>
                </p>
                <hr />
                <h4>Price: $<?=$product->getPrice();?></h4>
                <hr />
                <p><?=$product->getLongDescription();?></p>
            </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <div class="myform-top"><br/>
                    <h3 class="myform-subtitle text-center" >In Stock</h3>
                </div>

                <div class="myform-bottom">
                    <?= $this->displayMessages() ?>
                    <?php if (1==1) : ?>
                        <form role="form" method="post" action="#">
                            <input type="hidden" name="productId" value="<?= $product->getId(); ?>" />
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="myform-subtitle" for="categoryId">Quantity</label>
                                    <select name="quantity" id="quantity" class="form-control">
                                        <option selected value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" name="submit" class="mybtn">Add to Cart</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </aside><!-- /.blog-sidebar -->
    </div><!-- /.row -->
</main><!-- /.container -->