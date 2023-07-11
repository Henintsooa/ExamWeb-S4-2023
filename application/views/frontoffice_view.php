<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/fonts/icomoon/style.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css")?>">
    <title>Accueil</title>
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
                xhr.open("POST", '<?php echo base_url("Objectif_Controller/getsuggestions") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE");
                        console.log(xhr.responseText); 
                        console.log(xhr.status);

                        if(xhr.status === 200){
                            if(xhr.responseText !== 'error'){

                                var suggestions = JSON.parse(xhr.responseText.split("<")[0]);
                                var suggestionsDiv = document.getElementById("listsuggestion");

                                var html = "";
                                for (var i = 0; i < suggestions.length; i++) {
                                    var activites = suggestions[i].activites;
                                    var idRegime = suggestions[i].idRegime;
                                    var repetition = suggestions[i].repetition;
                                    var resultat = suggestions[i].resultat;
                                    var prixTotal = suggestions[i].prixTotal;
                                    var durree = suggestions[i].durree;

                                    html += "<div class='sugg' >";
                                    html += "<h6><p class='value'> Regime " + idRegime + "</p></h6>";
                                    html += "<h6>repetition: <p class='value'>" + repetition + " fois </p></h6>";
                                    html += "<h6>resultat: <p class='value'>" + resultat + " kilos </p></h6>";
                                    html += "<h6>prix Total: <p class='value'>" + prixTotal + " Ar </p> Ar</h6>";
                                    html += "<h6>durree Total: <p class='value'>" + durree + " jours </p></h6>";
                                    html += "<h6>Activités:<h6>";

                                    for (var j = 0; j < activites.length; j++) {
                                        var apport = activites[j].apport;
                                        var frequence = activites[j].frequence;
                                        var idActivite = activites[j].idActivite;
                                        var idType = activites[j].idType;
                                        var nom = activites[j].nom;
                                        var prix = activites[j].prix;

                                        html += "<div class='title' > - Activité " + (j + 1) + "</div>";
                                        html += "<div class='activite' >";
                                        if(idType == 1){
                                            html += "<p> sport </p><br>";
                                        }else{
                                            html += "<p> repas </p><br>";
                                        }
                                        html += "<p> apport: " + apport + "kilos </p><br>";
                                        html += "<p> fréquence: " + frequence + " fois </p><br>";
                                        html += "<p> nom: " + nom + " </p><br>";
                                        html += "<p> prix: " + prix + " Ar </p><br>";
                                        html += "</div>";
                                    }
                                    html += "<a href='<?php echo base_url("Objectif_Controller/insertobjectif?idRegime=") ; ?>"+idRegime+"&apport="+resultat+"&montant="+prixTotal+"&repetition="+repetition+"'>acheter</a>";
                                    html += "</div>";
                                }

                                suggestionsDiv.innerHTML = html;
                                console.log(suggestions);

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
                                window.location.href = '<?php echo base_url("Home_Controller/loadfrontoffice") ; ?>';
                            }else{
                                errorContainerUserdata.textContent = 'Donnes Invalides';
                            }
                        }else{
                            errorContainerUserdata.textContent = 'Erreur lors de la requete';
                        }
                    }
                    console.log(xhr.readyState);
                }
                xhr.send(formData);
            });
        });

</script>
<body>

        <div class="content">
            <div class="container">
                <div class="row align-items-stretch no-gutters contact-wrap">
                    <div class="col-md-12">
                        <div class="form h-100">
                            <h3>Bienvenu(e), <?php echo $userdata['username'] ;?> ! votre solde est de <?php echo $wallet['montant'] ;?> Ariary</h3>

                            <!-- form userdata -->    
                            <div class="userDataForm">
                                <h4>Vos informations</h4>
                                <form class="mb-5" method="POST" id="userdataForm" name="contactForm">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="sexe" class="col-form-label">sexe </label>
                                        <select class="form-control" name="sexe" id="sexe">
                                            <option value="0">homme</option>
                                            <option value="1">femme</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label class="col-form-label" for="taille">taille </label>
                                        <input class="form-control" type="number" step="1" name="taille" id="taille" required min=0>
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label  class="col-form-label" for="poids">poids :</label>
                                        <input class="form-control" type="number" step="1" name="poids" id="poids" required min=0>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="date" class="col-form-label">Sélectionnez une date </label>
                                        <input class="form-control" type="date" id="date" name="date" required>
                                   
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="submit" value="Valider" class="btn btn-primary rounded-0 py-2 px-4">
                                    </div>
                                </div>
                                </form> 
                                <p id="errorContainerUserdata"></p>
                            </div>
                            <!-- end form userdata -->  
                            
                            <!-- form regime -->
                            <div class="objectif_form">
                                <h4>Votre Objectif</h4>
                                <form class="mb-5" method="POST" id="objectifForm" name="contactForm" >
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label class="col-form-label" for="objectif">objectif :</label>
                                            <input class="form-control" type="number" step="1" name="objectif" id="objectif" required>
                                        </div>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                        <input type="submit" value="Suggerer regimes" class="btn btn-primary rounded-0 py-2 px-4">
                                        </div>
                                    </div>
                                   
                                </form>
                                <p id="errorContainerObjectif"></p>
                            </div>
                             <!-- end form regime --> 

                            <!-- list suggestion -->
                            <div id="listsuggestion">

                            </div>

                            <div class="listcode">
                                <?php foreach($codes as $code ){ ?>
                                    <p><?php echo $code['code'] ;?> - <?php echo $code['montant'] ;?> Ar </p>
                                    <a href="<?php echo base_url("Code_Controller/getcode?id=".$code['idCode']) ; ?>"> get code </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?= base_url("assets/js/jquery-3.3.1.min.js")?>"></script>
    <script src="<?= base_url("assets/js/popper.min.js")?>"></script>
    <script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
    <script src=" <?= base_url("assets/js/jquery.validate.min.js")?>"></script>
    <script src="<?= base_url("assets/js/jquery.validate.min.js")?>"></script>
</body>
</html>