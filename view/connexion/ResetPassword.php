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
            <div class="password-with-eye">
                <input type="password" name="password" id="password" placeholder="Mot de passe" required/>
                <i class="fas fa-eye" onclick="show()"></i>
            </div>
            <div class="password-with-eye">
                <input type="password" name="password" id="password2" placeholder="Confirm le mot de passe" required/>
                <i class="icon fas fa-eye" onclick="show2()"></i>
            </div>
            <button type="submit">LOGIN</button>
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

    function show2() {
        var password2 = document.getElementById("password2");
        var icon2 = document.querySelector(".icon")

        // ========== Checking type of password2 ===========
        if (password2.type === "password") {
            password2.type = "text";
        } else {
            password2.type = "password";
        }
    };
</script>
