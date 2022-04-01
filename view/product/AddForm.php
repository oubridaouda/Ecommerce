<div class="login-page">
    <h2>Formulaire d'ajout d'un articles</h2>
    <div class="form">
        <form action="<?= isset($params['product']) ? "/product-edit/{$params['product']->product_id}" : "/create-products" ?>"
              method="post">
            <!--            --><?php //echo'<pre>'; print_r($params['product']); echo'<pre>';?>
            <input name="title_product" type="text" value="<?= $params['product']->title_product ?? '' ?>"
                   placeholder="Titre"/>
            <input name="price" type="text" value="<?= $params['product']->price ?? '' ?>" placeholder="Prix"/>
            <input name="description" type="text" value="<?= $params['product']->description ?? '' ?>"
                   placeholder="Description"/>
            <input name="id_of_user" type="text" value="<?= $params['product']->id_of_user ?? '1' ?>"
                   placeholder="Description"/>
            <br>
            <br>
            <div class="login-form">
                <button type="submit">
                    Ajouter
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