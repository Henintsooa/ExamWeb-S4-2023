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
            var activiteForm = document.getElementById('activiteForm');
            var regimeForm = document.getElementById('regimeForm');
            var errorContainer = document.getElementById('errorContainer');
            var errorContainerRegime = document.getElementById('errorContainerRegime');
            

            // activite request
            activiteForm.addEventListener('submit', function(e){
                e.preventDefault();

                var formData = new FormData(activiteForm);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '<?php echo base_url("Activite_Controller/insertactivite") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE");

                        if(xhr.status === 200){
                            if(xhr.responseText === 'success'){
                                window.location.href = '<?php echo base_url("Home_Controller/loadbackoffice") ; ?>';
                            }else{
                                errorContainer.textContent = 'Donnes Invalides';
                            }
                        }else{
                            errorContainer.textCont1ent = 'Erreur lors de la requete';
                        }
                    }
                    console.log(xhr.readyState);
                }
                xhr.send(formData);
            });

            // regime request
            regimeForm.addEventListener('submit', function(e){
                e.preventDefault();

                var formData = new FormData(regimeForm);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '<?php echo base_url("Regime_Controller/insertregime") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE HAHAHA");

                        if(xhr.status === 200){
                            console.log(xhr.responseText);
                            if(xhr.responseText === 'success'){
                                window.location.href = '<?php echo base_url("Home_Controller/loadbackoffice") ; ?>';
                            }else{
                                errorContainerRegime.textContent = 'Donnes Invalides';
                            }
                        }else{
                            errorContainerRegime.textCont1ent = 'Erreur lors de la requete';
                        }
                    }
                    console.log(xhr.readyState);
                }
                xhr.send(formData);
            });
        });
</script>
<body>
    <div class="menu">
        <ul>
<<<<<<< HEAD
            <li><a href="#"> statistiques </a></li>
=======
            <li><a href="<?php echo base_url("Stat_Controller/index") ; ?>"> statistiques </a></li>
>>>>>>> c28c406a732413af15e4f6ac14553448451b36ff
            <li> <a href="<?php echo base_url("Home_Controller/loadbackoffice") ; ?>"> regime </a> </li>
            <li> <a href="<?php echo base_url("Home_Controller/loadCodeInterface") ; ?>"> code </a> </li>
        </ul>
    </div>

    <!-- diet session -->
    <!-- form activite -->
    <div class="activite_form">
        <h1>INSERTION ACTIVITE</h1>
        <form method="POST" id="activiteForm" >
            <label for="nom">Nom de l'activité:</label>
            <input type="text" name="nom" id="nom" required><br><br>

            <label for="idtype">Type de l'activité:</label>
            <select name="idtype" id="idtype">
                <?php foreach ($typeActivites as $type) { ?>
                    <option value="<?php echo $type['idType'] ; ?>"> <?php echo $type['nom'] ; ?> </option>
                <?php } ?>
            </select>
            <br><br>

            <label for="apport">Apport:</label>
            <input type="number" step="0.01" name="apport" id="apport" required><br><br>

            <label for="frequence">Fréquence:</label>
            <input type="number" step="1" name="frequence" id="frequence" required min=0><br><br>

            <label for="prix">Prix:</label>
            <input type="number" step="0.01" name="prix" id="prix" required><br><br>

            <input type="submit" value="Créer activité">
        </form>
        <p id="errorContainer">  </p>
    </div>

    <!-- form regime -->
    <div class="regime_form">
        <h1>INSERTION REGIME</h1>
        <?php var_dump($activites); ?>
        <form method="POST" id="regimeForm" >

            <label for="idactivite">Nom de l'activité:</label>
            <select name="idactivite" id="idactivite">
                <?php foreach ($activites as $activite) { ?>
                    <option value="<?php echo $activite['idActivite'] ; ?>"> <?php echo $activite['nom'] ; ?> </option>
                <?php } ?>
            </select>
            <br><br>

            <label for="idregime">Nom du regime:</label>
            <select name="idregime" id="idregime">
                <option value="99999">nouveau regime</option>
                <?php var_dump($regimes); ?>
                <?php foreach ($regimes as $regime) { ?>
                    <option value="<?php echo $regime['idRegime'] ; ?>/<?php echo $regime['nom'] ; ?>"> <?php echo $regime['nom'] ; ?> </option>
                <?php } ?>
            </select>
            <br><br>

            <label for="jourActivite">Jour d'Activite :</label>
            <input type="number" step="1" name="jourActivite" id="jourActivite" required min=0><br><br>

            <label for="finActivite">Durre Regime (jour) :</label>
            <input type="number" step="1" name="finActivite" id="finActivite" required min=0><br><br>

            <label for="nomregime">Nom du regime:</label>
            <input type="text" name="nomregime" id="nomregime"><br><br>

            <input type="submit" value="Ajouter/Creer regime">
        </form>
        <p id="errorContainerRegime"></p>
    </div>

</body>
</html>