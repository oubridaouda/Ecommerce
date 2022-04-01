<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="
    <?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'card.css?=' . time() ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'navbar.css?=' ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'procduct-form.css' ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'container.css' ?>"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'sass' . DIRECTORY_SEPARATOR . 'index.css' ?>"/>

</head>
<body style="font-family: 'Muli', sans-serif; background: #ddd;">

<nav>
    <input type="checkbox" id="check"/>
    <label for="check" class="menu">
    </label>
    <div class="logo">
        <h2>E-SHOP</h2>
    </div>
    <div class="nav-items-content">

        <div class="nav-items">
            <ul class="overview">
                <h3>Overview</h3>
                <li>
                    <a href="/"
                    >
                        Home</a
                    >
                </li>
                <?php if (isset($_SESSION['auth'])): ?>
                    <li>
                        <a href="/your-products">
                            Mes Produits</a
                        >
                    </li>
                <?php endif ?>
            </ul>
            <?php if (isset($_SESSION['auth'])) { ?>
                <ul class="account">
                    <h3>Account</h3>
                    <li>
                        <a href="/logout"
                        >
                            Se déconnecter</a
                        >
                    </li>
                </ul>
            <?php } else { ?>

                <ul class="account">
                    <h3>Account</h3>
                    <li>
                        <a href="/login"
                        >
                            Se connecter</a
                        >
                    </li>
                    <li>
                        <a href="/signup"
                        >
                            S'inscrir</a
                        >
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>

<!--        Toutes les page sont appelé dans le container via $content -->
<div class="container"><?= $content ?></div>
</body>
</html>