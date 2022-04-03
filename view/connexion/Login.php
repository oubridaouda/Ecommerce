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
        <form action="/login" method="POST">
            <input type="text" name="username" placeholder="&#xf007;  username"/>
            <div class="password-with-eye">
                <input type="password" name="password" id="password" placeholder="&#xf023;  password"/>
                <i class="fas fa-eye" onclick="show()"></i>
            </div>
            <br>
            <br>
            <button type="submit" name="submit">LOGIN</button>
            <p class="message"></p>
        </form>

        <form class="login-form">
            <button type="button" onclick="window.location.href='signup'">SIGN UP</button>
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
