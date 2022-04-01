<div class="products-card">
    <?php foreach ($params as $param) { ?>
<!--    --><?//= var_dump($param) ?>
        <div class="card">
            <div class="wsk-cp-product">
                <div class="wsk-cp-img">
                    <img src="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'image-1.jpg' ?>"
                         alt="Product" class="img-responsive"/>
                </div>
                <div class="wsk-cp-text">
                    <div class="category">
                        <span>Ethnic</span>
                    </div>
                    <div class="title-product">
                        <h3><?= $param->title_product ?></h3>
                    </div>
                    <div class="description-prod">
                        <p><?= $param->getExcerpt() ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="wcf-left"><span class="price">200£</span></div>
                        <div class="wcf-right"><a href="#" class="buy-btn"><i
                                        class="zmdi zmdi-shopping-basket"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }; ?>
</div>