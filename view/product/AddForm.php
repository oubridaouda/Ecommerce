<div class="login-page">
    <h3>Formulaire <?= isset($params['product']) ? "de modification" : "d'jouter" ?> d'un article</h3>
    <div class="form">
        <form action="<?= isset($params['product']) ? "/product-edit/{$params['product']->product_id}" : "/create-products" ?>"
              method="post">
            <!--            --><?php //echo'<pre>'; print_r($params['product']); echo'<pre>';?>
            <input name="title_product" type="text" value="<?= $params['product']->title_product ?? '' ?>"
                   placeholder="Titre"/>
            <input name="price" type="text" value="<?= $params['product']->price ?? '' ?>" placeholder="Prix"/>
            <input name="description" type="text" value="<?= $params['product']->description ?? '' ?>"
                   placeholder="Description"/>
            <input name="image" type="file" value="<?= $params['product']->image  ?? '' ?>"/>
            <br>
            <br>
            <div class="login-form">
                <button type="submit">
                    <?= isset($params['product']) ? "Modifier" : "Ajouter" ?>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function show() {
        var password = document.getElementById("password");
        var icon = document.querySelector(".fas");

        // ========== Checking type of password ===========
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password"
        }
    }
</script>