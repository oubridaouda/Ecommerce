<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="<?=SCRIPT . 'assets' . DIRECTORY_SEPARATOR . 'css'. DIRECTORY_SEPARATOR .'procduct-form.css'?>"/>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body class="body">
<div class="login-page">
    <h2>Formulaire d'ajout d'un articles</h2>
    <div class="form">
        <form>
            <input type="text" placeholder="Titre" />
            <input type="date" placeholder="Date" />
            <input type="text" placeholder="Prix" />
            <input type="textarea" placeholder="Description" />
            <br>
            <br>
        </form>

        <form class="login-form">
            <button type="button" onclick="window.location.href='login.html'">
                Ajouter
            </button>
        </form>
    </div>
</div>
</body>
<script>
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