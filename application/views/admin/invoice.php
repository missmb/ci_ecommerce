<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Order</h1>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id Invoice</th>
            <th>Name Order</th>
            <th>Shipping Address</th>
            <th>Order Date</th>
            <th>Max Payment</th>
            <th>Action</th>
        </tr>
        <?php foreach ($invoice as $inv) : ?>
            <tr>
                <td><?= $inv->id ?></td>
                <td><?= $inv->name ?></td>
                <td><?= $inv->address ?></td>
                <td><?= $inv->date_order ?></td>
                <td><?= $inv->max_payment ?></td>
                <td>
                <?= anchor('admin/detail_invoice/'.$inv->id, '<div class="btn btn-sm btn-primary">Details</div>'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>