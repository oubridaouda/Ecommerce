<?php
$message = false;
$succes = -1;
if (isset($_GET['success'])) {
    $succes = $_GET['success'];
    $message = ($succes) ? "Connexion reussie" : "Echec: Informations incorrectes";
    $class = ($succes) ? "btn btn-success" : "btn btn-danger";
}
?>
<div class="login-page">
    <div class="form">
        <h3 style="color:white; margin-bottom: 27px;">Mot de passe oublié</h3>
        <form action="/reset-form" method="POST">
            <input type="email" name="email" placeholder="&#xf007;  Adresse mail" required/>
            <button type="submit">Soumettre</button>
            <p class="message"></p>
        </form>
    </div>
</div>
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
        var icon = document.querySelector(".fas")

        // ========== Checking type of password ===========
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    };
</script>
