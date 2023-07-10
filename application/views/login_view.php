<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login/Register</title>


	<style>body{padding-top: 60px;}</style>

    <link href="<?= base_url("assets/css/bootstrap.css")?>" rel="stylesheet" />

	<link href="<?= base_url("assets/css/login-register.css")?>" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="<?= base_url("assets/js/jquery-1.10.2.js")?>" type="text/javascript"></script>
	<script src="<?= base_url("assets/js/bootstrap.js")?>" type="text/javascript"></script>
	<script src="<?= base_url("assets/js/login-register.js")?>" type="text/javascript"></script>
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
    <div class="container">
    <H1>Obtenez votre corps de rêve</H1>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
            
                <div class="row">
                 <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Log in</a>
                 <a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Register</a></div>
                </div>  
            </div>    
            </div>
            <div class="col-sm-4"></div> 
    <div class="modal fade login" id="loginModal">
        <div class="modal-dialog login animated">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Connectez-vous</h4>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="form loginBox">
                             <div class="content">
                                <form action="" id="loginForm" method="post" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" name="username" placeholder="Nom d'utilisateur">
                                    <input id="password" class="form-control" type="password" name="password" placeholder="Mot de passe">
                                    <button class="btn btn-default btn-login" type="submit">Se connecter</button>
                                </form>
                                <div id="errorContainer"></div>
                            </div>
                        </div>
                    </div> 
                    <div class="box">
                    <div class="content registerBox" style="display:none;">
                    <div class="form">
                        <div class="signup-session">
                            <form id="signupForm" method="post" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" name="username" placeholder="Nom d'utilisateur">
                                <input id="password" class="form-control" type="password" name="password" placeholder="Mot de passe">
                                <button class="btn btn-default btn-register" type="submit">S'inscrire</button>
                            </form>
                            <div id="errorSignup"></div>
                        </div>
                    </div>
                        
                    </div>
                       
                    </div>
                </div>
                <div class="modal-footer">
                     <div class="forgot login-footer">
                        <span>inscrivez-vous
                            <a href="javascript: showRegisterForm();">créez un compte</a>
                        ?</span>
                    </div>
                    <div class="forgot register-footer" style="display:none">
                        <span>Avez-vous déjà un compte?</span>
                        <a href="javascript: showLoginForm();">Login</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        openLoginModal();
    });
</script>
   
</body>
</html>


