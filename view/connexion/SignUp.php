<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet"
          href="<?= SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'signup_style.scss' ?>"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
            href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600"
            rel="stylesheet"
            type="text/css"
    />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
          integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body class="body">
<div class="login-page">
    <?php
    $message = false;
    $succes = -1;
    if (isset($_GET['success'])) {
        $succes = $_GET['success'];
        $message = ($succes) ? "Connexion reussie" : "Echec: Informations incorrectes";
        $class = ($succes) ? "btn btn-success" : "btn btn-danger";
    }
    ?>
    <div class="form">
        <form action="signup" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur"/>
            <div class="password-with-eye">
                <input type="password" id="password" name="password" placeholder="Mot de passe"/>
                <i class="fas fa-eye" onclick="show()"></i>
            </div>
            <br>
            <br>
            <button type="submit">
                SIGN UP
            </button>
        </form>

    </div>
</div>
</body>
<script>
    $(document).ready(function () {
        $('.required').css('color', 'red');
        let reload = <?php echo json_encode($succes);?>;
        if (!reload) {
            setTimeout(function () {
                // window.location.reload();
                window.location.href = '/signin';
            }, 1500);
        } else {
            if (reload === "true") {
                setTimeout(function () {
                    // window.location.reload();
                    window.location.href = '/';
                }, 1500);
            }
        }
    });

    function show() {
        var password = document.getElementById("password");
        var icon = document.querySelector(".fas");

        // ========== Checking type of password ===========
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }
</script>
</html>
</html>
