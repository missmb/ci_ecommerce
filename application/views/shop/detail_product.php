<div class="container-fluit">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="car">
        <h5 class="card-header">Detail Product</h5>
        <div class="card-body">
            <?php foreach ($product as $b) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('/assets/img/product/') . $b->cover ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Product Name</td>
                                <td><strong><?= $b->name; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><strong><?= $b->description; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><strong><?= $b->category; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td><strong><?= $b->stock; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-success">Rp. <?= number_format($b->price, 0,',','.'); ?></div>
                                    </strong></td>
                            </tr>
                        </table>

                        <?= anchor('shop/add_to_card/'.$b->id, '<div class="btn btn-sm btn-primary"> Add To Cart </div>'); ?>
                        <?= anchor('shop/', '<div class="btn btn-sm btn-danger">Back</div>'); ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>