<main role="main" class="col-sm-12 pt-3">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
        <h1 class="h2">Product List</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-secondary"
                   href="/<?=APP_HOST?>product/new"
                   role="button">New Product</a>
            </div>
        </div>
    </div>

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
                                     "/" . APP_HOST . "public/content/img/noimage.gif"; ?>"
                                 class="rounded float-left img-thumbnail img-fluid"
                                 alt="Product Image" />
                        </td>
                        <td><?=$product->getTitle();?></td>
                        <td><?=$product->getCost();?></td>
                        <td><?=$product->getPrice();?></td>
                        <td><?=!empty($product->getCategory()) ? $product->getCategory()->getName() : "Not defined";?></td>
                        <td>
                            <a title="View"
                               href="/<?=APP_HOST?>product/details/id=<?= $product->getId(); ?>">
                                <i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;

                            <a title="Edit"
                               href="/<?=APP_HOST?>product/edit/id=<?= $product->getId(); ?>">
                                <i class="fa fa-edit" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div><!-- /Responsive table -->
    </div><!-- /container -->
</main><!-- /main -->