<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- check login via httprequest ajax -->
<script>
    document.addEventListener(
        'DOMContentLoaded', function(){
            var loginForm = document.getElementById('loginForm');
            var signupForm = document.getElementById('signupForm');
            var errorContainer = document.getElementById('errorContainer');
            var errorSignup = document.getElementById('errorSignup');

            // login request
            loginForm.addEventListener('submit', function(e){
                e.preventDefault();

                var formData = new FormData(loginForm);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '<?php echo base_url("Profile_Controller/CheckLogin") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE");

                        if(xhr.status === 200){
                            if(xhr.responseText === 'success'){
                                window.location.href = '<?php echo base_url("Home_Controller") ; ?>';
                            }else{
                                errorContainer.textContent = 'Identifiants Invalides';
                            }
                        }else{
                            errorContainer.textContent = 'Erreur lors de la requete';
                        }
                    }
                    console.log(xhr.readyState);
                }
                xhr.send(formData);
            });

            // signup request
            signupForm.addEventListener('submit', function(e){
                e.preventDefault();

                var formData = new FormData(signupForm);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '<?php echo base_url("Profile_Controller/CheckSignUp") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE NOW");

                        if(xhr.status === 200){
                            if(xhr.responseText === 'success'){
                                window.location.href = '<?php echo base_url("Home_Controller") ; ?>';
                            }else{
                                errorSignup.textContent = 'Formulaires Invalides';
                            }
                        }else{
                            errorSignup.textContent = 'Erreur lors de la requete';
                        }
                    }
                    console.log(xhr.readyState);
                }
                xhr.send(formData);
            });
        });
</script>

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


