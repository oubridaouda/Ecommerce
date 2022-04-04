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
    <div class="toast__container">
        <div class="toast__cell">
            <?php if (isset($_GET['success']) && $_GET['success'] === "false") { ?>


                <div style="position: relative; animation: animatetop 1.5s;" class="toast toast--blue add-margin">
                    <div class="toast__icon">
                    </div>
                    <div class="toast__content">
                        <p class="toast__type">Echec</p>
                        <p class="toast__message">Votre identifiant ou votre mot de passe est incorrect</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            <?php }; ?>

            <?php if (isset($_GET['success']) && $_GET['success'] === "true") { ?>
                <div style="position: relative; animation: animatetop 1.5s;width: 360px;" class="toast toast--green">
                    <div class="toast__icon">
                    </div>
                    <div class="toast__content">
                        <p class="toast__type">Confirmation</p>
                        <p class="toast__message">Connexion réussie</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            <?php }; ?>

            <?php if (isset($_GET['reset-email-send']) && $_GET['reset-email-send'] === "true") { ?>
                <div style="position: relative; animation: animatetop 1.5s;width: 360px;" class="toast toast--green">
                    <div class="toast__icon">
                    </div>
                    <div class="toast__content">
                        <p class="toast__type">Mot de passe oublié</p>
                        <p class="toast__message">Un de restauration de votre mot passe vous a été envoyé par email.</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            <?php }; ?>
        </div>
    </div>


    <div style="margin-top: 15px; text-align: start;" class="form">
        <h3 style="color:white; margin-bottom: 27px; text-align: center;">Connexion</h3>
        <form action="/login" method="POST">
            <div style="margin-bottom: 15px">

                <input style="margin: 0" type="email" name="username" placeholder="&#xf007;  Adresse mail" required/>
                <?php if (isset($_GET['success']) && $_GET['success'] === "false") { ?>

                    <label style="color:red;font-size: 14px;">Entrez une adresse mail valide</label>
                <?php }; ?>
            </div>

            <div style="margin-bottom: 15px">
                <div class="password-with-eye">
                    <input style="margin: 0" type="password" name="password" id="password"
                    placeholder="&#xf023;  Mot de passe" required/>
                    <i class="fas fa-eye" onclick="show()"></i>
                </div>
                <?php if (isset($_GET['success']) && $_GET['success'] === "false") { ?>
                    <label style="color:red;font-size: 14px;">Entrez un mot de passe valide</label>
                <?php }; ?>
            </div>
            <a href="/reset-form">Mot de passe oublié?</a>

            <button type="submit" name="submit">LOGIN</button>
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

    jQuery(document).ready(function () {
        jQuery('.toast__close').click(function (e) {
            e.preventDefault();
            var parent = $(this).parent('.toast');
            parent.fadeOut("slow", function () {
                $(this).remove();
            });
        });
    });
</script>
