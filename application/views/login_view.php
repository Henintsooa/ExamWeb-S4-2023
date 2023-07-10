<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- check login via httprequest ajax -->

<body>
    <div class="login-session">
        <form id="loginForm" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <button type="submit">Se connecter</button>
        </form>

        <?php echo base_url("Profile_Controller/CheckLogin") ;?>
        <div id="errorContainer"></div>
    </div>

    <div class="signup-session">
        <form id="signupForm" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <button type="submit">S'inscrire</button>
        </form>

        <?php echo base_url("Profile_Controller/CheckLogin") ;?>
        <div id="errorSignup"></div>
    </div>
</body>
</html>


