<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    document.addEventListener(
        'DOMContentLoaded', function(){
            var objectifForm = document.getElementById('objectifForm');
            var userDataForm = document.getElementById('userdataForm');
            var errorContainerobjectif = document.getElementById('errorContainerObjectif');
            var errorContainerUserdata = document.getElementById('errorContainerUserdata');

            // objectif request
            objectifForm.addEventListener('submit', function(e){
                e.preventDefault();

                var formData = new FormData(objectifForm);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '<?php echo base_url("objectif_Controller/insertobjectif") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE");

                        if(xhr.status === 200){
                            if(xhr.responseText === 'success'){
                                window.location.href = '<?php echo base_url("Home_Controller/loadobjectifinterface") ; ?>';
                            }else{
                                errorContainerobjectif.textContent = 'Donnes Invalides';
                            }
                        }else{
                            errorContainerobjectif.textCont1ent = 'Erreur lors de la requete';
                        }
                    }
                    console.log(xhr.readyState);
                }
                xhr.send(formData);
            });

            userDataForm.addEventListener('submit', function(e){
                e.preventDefault();

                var formData = new FormData(userDataForm);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '<?php echo base_url("UserData_Controller/insertuserdata") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE");

                        if(xhr.status === 200){
                            if(xhr.responseText === 'success'){
                                window.location.href = '<?php echo base_url("Home_Controller/loadobjectifinterface") ; ?>';
                            }else{
                                errorContainerobjectif.textContent = 'Donnes Invalides';
                            }
                        }else{
                            errorContainerobjectif.textCont1ent = 'Erreur lors de la requete';
                        }
                    }
                    console.log(xhr.readyState);
                }
                xhr.send(formData);
            });
        });

</script>
<body>

    <h1>HELLO YOU <?php echo $userdata['username'] ;?> </h1>
    <p>
        <?php
            var_dump($userdata);
        ?>
    </p>

    <!-- form userdata -->    
    <div class="userDataForm">
        <h1>Insertion userdata</h1>
        <form method="POST" id="userdataForm" >

            <label for="sexe">sexe :</label>
            <select name="sexe" id="sexe">
                <option value="0">homme</option>
                <option value="1">femme</option>
            </select><br><br>

            <label for="taille">taille :</label>
            <input type="number" step="1" name="taille" id="taille" required min=0><br><br>

            <label for="poids">poids :</label>
            <input type="number" step="1" name="poids" id="poids" required min=0><br><br>

            <input type="submit" value="inserer data">
        </form> 
        <p id="errorContainerUserdata"></p>
    </div>
    
    <!-- form regime -->
    <div class="objectif_form">
        <h1>INSERTION Objectifs</h1>
        <form method="POST" id="objectifForm" >

            <label for="objectif">objectif :</label>
            <input type="number" step="1" name="montant" id="objectif" required min=0><br><br>

            <input type="submit" value="Suggerer regimes">
        </form>
        <p id="errorContainerObjectif"></p>
    </div>

    <!-- list suggestion -->
    <div id="suggestionsList">

    </div>
</body>
</html>