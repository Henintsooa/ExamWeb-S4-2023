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
            var codeForm = document.getElementById('codeForm');
            var errorContainerCode = document.getElementById('errorContainerCode');

            // code request
            codeForm.addEventListener('submit', function(e){
                e.preventDefault();

                var formData = new FormData(codeForm);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", '<?php echo base_url("Code_Controller/insertcode") ; ?>' , true);

                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 4){
                        console.log("HI IM HERE");

                        if(xhr.status === 200){
                            if(xhr.responseText === 'success'){
                                window.location.href = '<?php echo base_url("Home_Controller/loadcodeinterface") ; ?>';
                            }else{
                                errorContainerCode.textContent = 'Donnes Invalides';
                            }
                        }else{
                            errorContainerCode.textCont1ent = 'Erreur lors de la requete';
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
            <li> <a href="<?php echo base_url("Home_Controller/loadbackoffice") ; ?>"> regime </a> </li>
            <li> <a href="<?php echo base_url("Home_Controller/loadcodeinterface") ; ?>"> code </a> </li>
        </ul>
    </div>
    </div>
    <!-- form regime -->
    <div class="code_form">
        <h1>INSERTION REGIME</h1>
        <form method="POST" id="codeForm" >

            <label for="code">Code :</label>
            <input type="text" name="code" id="code"><br><br>

            <label for="montant">Montant :</label>
            <input type="number" step="1" name="montant" id="montant" required min=0><br><br>

            <input type="submit" value="Ajouter Code">
        </form>
        <p id="errorContainerCode"></p>
    </div>
</body>
</html>