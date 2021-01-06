<!-- Begin Page Content -->
<div class="container-fluid">

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url() . '/assets/img/product/banner.png' ?>" class="d-block w-100" alt="..." height="250px">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url() . '/assets/img/product/banner2.png' ?>" class="d-block w-100" alt="..." height="250px">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url() . '/assets/img/product/banner3.png' ?>" class="d-block w-100" alt="..." height="250px">
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>

    </div>

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <div class="row text-center mt-4">
        <?php foreach ($product as $p) : ?>

            <div class="card ml-3" style="width: 16rem;">
                <img src="<?= base_url() . '/assets/img/product/' . $p->cover ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-1"><a href=""> <?= $p->name; ?> </a></h5>
                    <small class="card-text"><?= $p->description; ?></small> <br>
                    <span class="badge badge-pill badge-success mb-3">Rp. <?= number_format($p->price, 0, ',', '.'); ?></span> <br>
                    <?= anchor('shop/add_to_cart/' . $p->id , '<div class="btn btn-sm btn-primary">Add to Cart</div>') ?>
                </div>
            </div>

        <?php endforeach ?>
    </div>

</div>