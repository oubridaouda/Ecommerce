<div class="shell">
    <div class="products-container">
        <div class="products-card">
            <?php for ($i = 1; $i <= 6; $i++) { ?>
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
                                <h3>My face not my heart</h3>
                            </div>
                            <div class="description-prod">
                                <p>Description Product tell me how to change playlist height size like 600px in html5
                                    player. player good work now check this link</p>
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
            <?php } ?>
        </div>
    </div>
</div>