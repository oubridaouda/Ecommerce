<div class="login-page">
    <div class="form">
        <h3 style="color:white; margin-bottom: 27px;"><?= isset($params['product']) ? "Modification" : "Ajouter" ?> un article</h3>
        <form action="<?= isset($params['product']) ? "/product-edit/{$params['product']->product_id}" : "/create-products" ?>"
              method="post" enctype="multipart/form-data">
            <!--            --><?php //echo'<pre>'; print_r($params['product']); echo'<pre>';?>
            <input name="title_product" type="text" value="<?= $params['product']->title_product ?? '' ?>"
                   placeholder="Titre"/>
            <input name="price" type="text" value="<?= $params['product']->price ?? '' ?>" placeholder="Prix"/>
            <input name="description" type="text" value="<?= $params['product']->description ?? '' ?>"
                   placeholder="Description"/>
            <input name="image" type="file" value="<?= $params['product']->image ?? '' ?>"/>
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
    <h2>W3.CSS Animated Modal</h2>
    <p>Zoom in the modal with the w3-animate-zoom class, or slide in the modal from a specific direction using the w3-animate-top, w3-animate-bottom, w3-animate-left or w3-animate-right class:</p>
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Animated Modal</button>

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-teal">
        <span onclick="document.getElementById('id01').style.display='none'"
              class="w3-button w3-display-topright">&times;</span>
                <h2>Modal Header</h2>
            </header>
            <div class="w3-container">
                <p>Some text..</p>
                <p>Some text..</p>
            </div>
            <footer class="w3-container w3-teal">
                <p>Modal Footer</p>
            </footer>
        </div>
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