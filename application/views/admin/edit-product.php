<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>Edit Data Product</h3>

    <?php foreach ($product as $b) : ?>
        <form method="post" action="<?= base_url('admin/update'); ?>">
            <input type="hidden" name="id" class="form-control" value="<?= $b->id ?>" ?>

            <div class="form-group">
                <label for="name">Name Product</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $b->name ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description Product</label>
                <input type="text" name="description" id="description" class="form-control" value="<?= $b->description ?>" />
            </div>
            <div class="form-group">
                <label for="category">Category Product</label>
                <input type="text" name="category" id="category" class="form-control" value="<?= $b->category ?>" />
            </div>
            <div class="form-group">
                <label for="price">Price Product</label>
                <input type="number" name="price" id="price" class="form-control" value="<?= $b->price ?>" />
            </div>
            <div class="form-group">
                <label for="stock">Stock Product</label>
                <input type="number" name="stock" id="stock" class="form-control" value="<?= $b->stock ?>" />
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Save</button>
        </form>
    <?php endforeach; ?>
</div>