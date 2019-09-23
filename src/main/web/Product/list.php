<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h2>Product List</h2>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->model as $product) : ?>
                    <tr>
                        <td><?=$product->getId();?></td>
                        <td width="10%">

                            <img style="width: 5rem;"
                                 src="<?= !empty($product->getImage()) ?
                                     "/" . APP_HOST . "public/content/img/products/" . $product->getImage() :
                                     "/" . APP_HOST . "public/content/img/no-product.png)"; ?>"
                                 class="rounded float-left img-thumbnail img-fluid"
                                 alt="Product Image" />
                        </td>

                        <td><?=$product->getTitle();?></td>
                        <td><?=$product->getCost();?></td>
                        <td><?=$product->getPrice();?></td>
                        <td><?="product->getCategories()[0]->getName();"?></td>
                        <td>
                            <a title="View"
                               href="/<?=APP_HOST?>product/details/id=<?= $product->getId(); ?>">
                                <i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;

                            <a title="Edit"
                               href="/<?=APP_HOST?>product/edit/id=<?= $product->getId(); ?>">
                                <i class="fa fa-edit" aria-hidden="true"></i></a>
                            &nbsp;
                            <a title="Delete"
                               href="/<?=APP_HOST?>product/delete/id=<?= $product->getId(); ?>">
                                <i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <?php
            //Generate naviational page links if we have more than one page
        /*    if ($numPages > 1) {
                echo getPagination($userSearch, $sort, $curPage, $numPages);
            }*/
            ?>

        </div><!-- /Responsive table -->
    </div><!-- /container -->
</main><!-- /main -->