<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addProduct"><i class="fas fa-plus fa-sm"></i> Add Product</button>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th colspan="3">Action</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($product as $b) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $b->name; ?></td>
                <td><?= $b->description; ?></td>
                <td><?= $b->category; ?></td>
                <td><?= $b->price; ?></td>
                <td><?= $b->stock; ?></td>
                <td>
                    <div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>
                </td>
                <td>
                <?= anchor('admin/edit/' . $b->id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>                    
                </td>
                <td>
                <?= anchor('admin/delete/' . $b->id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?> 
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Add New Product</h5>
                <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form action="<?= base_url('admin/addProduct'); ?>" method="POST" enctype="multipart/form-data"> -->
            <?= form_open_multipart('admin/addProduct'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description Product">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                        <option>electronic</option>
                        <option>women</option>
                        <option>kids</option>
                        <option>sport</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price Product">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock Product">
                    </div>
                    <div class="form-group">
                        <label for="cover">Cover Product</label>
                        <input type="file" class="form-control" id="cover" name="cover" placeholder="cover Product">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>