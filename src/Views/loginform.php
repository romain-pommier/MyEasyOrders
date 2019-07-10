

<?php
    ob_start();
?>
<!--##############################################################################-->
<!---------------------------------CONNECT FORM------------------------------------->
<!--##############################################################################-->
<div class="wrapperLogin fadeInDownLogin">
    <div id="formContentLogin" class="form">
        <div class="fadeIn first">
        <img src="src/images/logo-firstseller.jpg" id="icon" alt="User Icon" />
        </div>
        <h2>Connexion:</h2>
        <form method="post" >
            <input type="text" name="login" value="" class="fadeIn second" placeholder="Nom d'utilisateur" required>
            <input type="password" name="pass" value="" class="fadeIn third" placeholder="mot de passe" required>
            <input type="submit" name="connexion" class="fadeIn fourth" value="Connexion">
        </form>
    </div>
</div>

<?php
    $content = ob_get_clean();
    require_once 'template.php';
