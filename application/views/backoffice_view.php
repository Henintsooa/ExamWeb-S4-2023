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
            var errorContainer = document.getElementById('errorContainer');

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
                                window.location.href = '<?php echo base_url("Home_Controller") ; ?>';
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
        });
</script>
<body>
    <div class="menu">
        <ul>
            <li><a href=""> statistiques </a></li>
            <li> <a href=""> regime </a> </li>
            <li> <a href=""> code </a> </li>
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
            <input type="number" step="1" name="frequence" id="frequence" required><br><br>

            <label for="prix">Prix:</label>
            <input type="number" step="0.01" name="prix" id="prix" required><br><br>

            <input type="submit" value="Créer activité">
        </form>
        <p id="errorContainer">  </p>
    </div>

    <!-- form regime -->
    <div class="regime_form">
        <h1>INSERTION REGIME</h1>
        <form method="POST" id="regimeForm" >

            <label for="idactivite">Nom de l'activité:</label>
            <select name="idactivite" id="idactivite">
                <?php foreach ($activites as $activite) { ?>
                    <option value="<?php echo $type['idActivite'] ; ?>"> <?php echo $type['nom'] ; ?> </option>
                <?php } ?>
            </select>
            <br><br>

            <label for="apport">Apport:</label>
            <input type="number" step="0.01" name="apport" id="apport" required><br><br>

            <label for="frequence">Fréquence:</label>
            <input type="number" step="1" name="frequence" id="frequence" required><br><br>

            <label for="prix">Prix:</label>
            <input type="number" step="0.01" name="prix" id="prix" required><br><br>

            <input type="submit" value="Créer activité">
        </form>
        <p id="errorContainer">  </p>
    </div>

</body>
</html>