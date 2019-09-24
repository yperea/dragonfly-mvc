<?php
$product = $this->model->getProduct();
$categories = $this->model->getCategories();
?>

<main role="main" class="col-sm-12 pt-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Product</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-success" href="/<?=APP_HOST?>product/list" role="button">Back to Products List</a>
            </div>
        </div>
    </div>
    <br/>
    <div class="row justify-content-center">
        <div class="col-md-3 order-md-2 mb-4">
            <div id="importantCard" class="card border-secondary mb-3">
                <div class="card-header"><h5><?=$product->getTitle();?></h5></div>

                <div>
                    <img src="<?= !empty($product->getImage()) ?
                        "/" . APP_HOST . "public/content/img/products/" . $product->getImage() :
                        "/" . APP_HOST . "public/content/img/noimage.gif"; ?>"
                         class="rounded float-left img-thumbnail img-fluid"
                         alt="<?=$product->getTitle();?> Image">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <h4 class="mb-3">Product</h4>

            <form class="needs-validation"
                  enctype="multipart/form-data"
                  id="frmProduct"
                  action=""
                  method="POST"
                  novalidate>

                <?= $this->displayMessages() ?>

                <input type="hidden" id="productId" name="productId"
                       value="<?= $product->getId() ?>"/>

                <input type="hidden" id="currentProductImage" name="currentProductImage"
                       value="<?= $product->getImage() ?>"/>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="productSKU">SKU</label>
                        <input type="text"
                               class="form-control"
                               id="productSKU"
                               name="productSKU"
                               placeholder=""
                               value="<?= $product->getSKU()?>"
                               required />
                        <div class="invalid-feedback">
                            Product Title is required.
                        </div>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="productTitle">Title</label>
                        <input type="text"
                               class="form-control"
                               id="productTitle"
                               name="productTitle"
                               placeholder=""
                               value="<?= $product->getTitle()?>"
                               required />
                        <div class="invalid-feedback">
                            Product Title is required.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="productCost" >Cost</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number"
                                   id="productCost"
                                   name="productCost"
                                   class="form-control"
                                   placeholder="Cost"
                                   maxlength="5"
                                   aria-label="Amount (to the nearest dollar)"
                                   value="<?= $product->getCost(); ?>"
                                   required />
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid cost.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="productPrice" >Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number"
                                   id="productPrice"
                                   name="productPrice"
                                   class="form-control"
                                   placeholder="Price"
                                   maxlength="5"
                                   aria-label="Amount (to the nearest dollar)"
                                   value="<?= $product->getPrice(); ?>"
                                   required />
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Price.
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="productQuantity" >Quantity</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">#</span>
                            </div>
                            <input type="number"
                                   id="productQuantity"
                                   name="productQuantity"
                                   class="form-control"
                                   placeholder="Quantity"
                                   maxlength="5"
                                   aria-label=""
                                   value="<?= $product->getQuantity(); ?>"
                                   required />
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Price.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="productCategory">Category</label>

                        <select class="custom-select d-block w-100"
                                id="productCategory"
                                name="productCategory"
                                required />
                        <option value="">Choose...</option>
                        <?php foreach ($categories as $category) :?>
                            <option value="<?= $category->getId() ?>"
                                <?= $category->getId() == $product->getCategoryId() ? "selected" : "" ?>
                            ><?= $category->getName() ?></option>
                        <?php endforeach; ?>
                        </select>

                        <div class="invalid-feedback">
                            Please select a Category.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="productShortDescription">Short Description</label>
                    <textarea class="form-control"
                              id="productShortDescription"
                              name="productShortDescription"
                              size="255"
                              required ><?=$product->getShortDescription();?></textarea>
                    <div class="invalid-feedback">
                        Please enter a short description for the product.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="productLongDescription">Long Description</label>
                    <textarea class="form-control"
                              id="productLongDescription"
                              name="productLongDescription"
                              size="512"
                              required ><?=$product->getLongDescription();?></textarea>
                    <div class="invalid-feedback">
                        Please enter the full description of the product.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="newProductImage">Product Image</label>
                            <input type="file"
                                   class="form-control-file"
                                   id="newProductImage"
                                   name="newProductImage" />
                        </div>
                    </div>
                </div>

                <button class="btn btn-success btn-lg btn-block" type="submit">Save</button>
            </form>
        </div>
    </div>
</main>
