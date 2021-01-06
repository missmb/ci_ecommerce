<div class="container-fluid">
    <h4>Shopping Cart</h4>

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
</div>