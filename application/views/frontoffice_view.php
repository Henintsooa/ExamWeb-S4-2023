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
            var errorContainerobjectif = document.getElementById('errorContainerObjectif');

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
        });

</script>
<body>
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
</body>
</html>