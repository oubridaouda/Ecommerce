<div class="shell">
    <?php if (isset($_GET['success'])): ?>
        <div>Vous etes connecté!</div>
    <?php endif ?>
    <?php

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    ?>
    <div class="products-card">
        <?php foreach ($params['products'] as $param) { ?>
            <!--        --><? //=//var_dump($param) ?>
            <div class="card">
                <div class="wsk-cp-product">
                    <a style="
                    position: absolute;
                    width: 100%;
                    height: 100%;" href="/products/<?= $param->product_id ?>"></a>
                    <div class="wsk-cp-img">
                        <img src="<?=$params->image ?? '' ?><?= isset($params->image) ? '' : SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'image-1.jpg' ?>"
                             alt="Product" class="img-responsive"/>
                    </div>
                    <div class="wsk-cp-text">
                        <div class="category">
                            <span><?= $param->price ?> £</span>
                        </div>
                        <div class="title-product">
                            <h3><?= $param->title_product ?></h3>
                        </div>
                        <div class="description-prod">
                            <p><?= $param->getExcerpt() ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="wcf-left"><span class="price"><?= $param->price ?>£</span></div>
                            <div class="wcf-right"><a href="#" class="buy-btn"><i
                                            class="zmdi zmdi-shopping-basket"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>