<div class="product-container">
    <div class="image">
        <img class="img-responsive" src="../upload/<?= $product->getFeaturedImage() ?>" alt="">
    </div>
    <div class="product-meta">
        <h5 class="name">
            <a class="product-name" href="index.php?c=product&a=show&id=<?= $product->getId() ?>" title="Kem làm trắng da 5 trong 1 Beaumore Secret Whitening Cream"><?= $product->getName() ?></a>
        </h5>
        <div class="product-item-price">
            <?php if ($product->getPrice() != $product->getSalePrice()) : ?>
                <span class="product-item-regular"><?= number_format($product->getPrice()) ?> ₫</span>
            <?php endif; ?>
            <span class="product-item-discount"><?= number_format($product->getSalePrice()) ?>₫</span>
        </div>
    </div>
    <div class="button-product-action clearfix">
        <div class="cart icon">
            <?php if ($product->getInventoryQty() > 0) : ?>
                <a class="btn btn-outline-inverse buy" product-id="<?= $product->getId() ?>" href="javascript:void(0)" title="Thêm vào giỏ">
                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                </a>
            <?php else : ?>
                <a class="btn btn-outline-inverse disabled" href="javascript:void(0)">
                    Hết hàng
                </a>
            <?php endif; ?>
        </div>
        <div class="quickview icon">
            <a class="btn btn-outline-inverse" href="index.php?c=product&a=show&id=<?= $product->getId() ?>" title="Xem nhanh">
                Xem chi tiết <i class="fa fa-eye"></i>
            </a>
        </div>
    </div>
</div>