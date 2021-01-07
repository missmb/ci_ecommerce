<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Shopping <?= $title; ?></h1>


    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Total</th>
            <th>Price</th>
            <th>Sub-Total</th>
        </tr>

        <?php $i = 1;
        foreach ($this->cart->contents() as $it) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $it['name']; ?></td>
                <td><?= $it['qty']; ?></td>
                <td align="right">Rp. <?= number_format($it['price'], 0, ',', '.'); ?></td>
                <td align="right">Rp. <?= number_format($it['subtotal'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="4"></td>
            <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
        </tr>
    </table>

    <div align="right">
    <a href="<?= base_url('shop/delete_cart') ?>">
    <div class="btn btn-sm btn-danger">Delete</div></a>
    <a href="<?= base_url('shop') ?>">
    <div class="btn btn-sm btn-primary">Shop again</div></a>
    <a href="<?= base_url('shop/payment') ?>">
    <div class="btn btn-sm btn-success">payment</div></a>
    </div>
</div>