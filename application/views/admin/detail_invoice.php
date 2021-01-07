<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> <div class="btn btn-sm btn-success">No. Invoice <?= $invoice->id; ?></div></h1>

    <table class="table table-bordered table-striped table-hover">
    <tr>
    <th>ID Product</th>
    <th>Name Product</th>
    <th>Quantity Order</th>
    <th>Unit Price</th>
    <th>Sub-Total</th>
    </tr>
    
    <?php 
    $total = 0;
    foreach ($order as $or) :
        $subtotal = $or->quantity * $or->price;
        $total += $subtotal;
    ?>

<tr>
<td><?= $or->id_product ?></td>
<td><?= $or->name ?></td>
<td><?= $or->quantity ?></td>
<td><?= number_format($or->price, 0,',','.') ?></td>
<td><?= number_format($subtotal, 0,',','.') ?></td>
</tr>
    <?php endforeach; ?>

    <tr>
    <td colspan="4" align="right">Grand Total</td>
    <td align="right">Rp. <?= number_format($total, 0,',','.') ?></td>
    </tr>
    </table>

    <a href="<?= base_url('admin/invoice') ?>"><div class="btn btn-sm btn-primary">Back</div></a>
</div>