<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php $grand_total = 0;
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $it) {
                        $grand_total = $grand_total + $it['subtotal'];
                    }

                    echo " Total : Rp. " . number_format($grand_total, 0, ',', '.');
                 ?>
            </div><br><br>
            <h5>Input Address Shipping and Payment</h5>
            <form method="post" action="<?= base_url('shop/process') ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Input your Name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Input your Address">
                </div>
                <div class="form-group">
                    <label for="no_tlp">No. Telephone</label>
                    <input type="text" name="no_tlp" id="no_tlp" class="form-control" placeholder="Input your Number">
                </div>
                <div class="form-group">
                    <label for="service">Shipping Sevice</label>
                    <select class="form-control">
                        <option>JNE</option>
                        <option>TIKI</option>
                        <option>POS Indonesia</option>
                        <option>GOJEK</option>
                        <option>GRAB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment">Shipping Sevice</label>
                    <select class="form-control">
                        <option>BCA - xxxxxxx</option>
                        <option>BNI - xxxxxxx</option>
                        <option>BRI - xxxxxxx</option>
                        <option>MANDIRI - xxxxxxx</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Order</button>
            </form>
            <?php 
                }else{
                    echo "<h4>Your Cart is Still Empty</h4>";
                }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>