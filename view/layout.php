<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="
    <?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'card.css?=' . time() ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'navbar.css?=' . time() ?>"/>

</head>
<body>

<nav>
    <input type="checkbox" id="check"/>
    <label for="check" class="menu">
    </label>
    <div class="logo">
        <h2>NavBar</h2>
    </div>
    <div class="nav-item-content">

        <div class="nav-items">
            <ul class="overview">
                <h3>Overview</h3>
                <li>
                    <a href="/Ecommerce/"
                    >
                        Home</a
                    >
                </li>
                <li>
                    <a href="/Ecommerce/products">
                        Produits</a
                    >
                </li>
                <li>
                    <a href="/login"
                    >
                        Rates</a
                    >
                </li>
                <li>
                    <a href="/signup"
                    >
                        Contact</a
                    >
                </li>
            </ul>
            <ul class="account">
                <h3>Account</h3>
                <li>
                    <a href="/Ecommerce/login"
                    >
                        Se connecter</a
                    >
                </li>
                <li>
                    <a href="/Ecommerce/signup"
                    >
                        S'inscrir</a
                    >
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--        Toutes les page sont appelé dans le container via $content -->
<div class="container"><?= $content ?></div>
</body>
</html>