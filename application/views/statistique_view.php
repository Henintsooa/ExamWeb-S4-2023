<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url("assets/img/apple-icon.png")?>">
  <link rel="icon" type="image/png" href="<?= base_url("assets/img/favicon.png")?>">
  <title>
      Back office
  </title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.css">
  <style>
    /* Styles pour les graphiques */
    .chart-container {
      width: 400px;
      height: 400px;
      margin-bottom: 30px;
    }
  </style>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  
  <link href="<?= base_url("assets/css/nucleo-icons.css")?>" rel="stylesheet" />
  <link href="<?= base_url("assets/css/nucleo-svg.css")?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url("assets/css/material-dashboard.css?v=3.1.0")?>" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  
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
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <span class="ms-1 font-weight-bold text-white">Admin</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="<?php echo base_url("Stat_Controller/index") ; ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Statistique</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="<?php echo base_url("Home_Controller/loadbackoffice") ; ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Régime</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php echo base_url("Home_Controller/loadcodeinterface") ; ?>">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Code</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary w-100" href="<?php echo base_url("Home_Controller/deconnexion") ; ?>" type="button">Déconnexion</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Ecrire ici...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?= base_url("assets/img/team-2.jpg")?>" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src=" <?= base_url("assets/img/small-logos/logo-spotify.svg")?>" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Back office</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                        
                   
                  </thead>
                  <tbody>
                  <div class="menu">

                </div>
                </div>
                <!-- form regime -->
                        <h1>Statistiques</h1>

                        <h2>Régime maximum utilisé :</h2>
                        <?php if (!empty($regimeMax)): ?>
                            <ul>
                                <?php foreach ($regimeMax as $regime): ?>
                                    <li><?php echo $regime; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>Aucun régime maximum utilisé</p>
                        <?php endif; ?>

                        <h2>Nombre de ventes :</h2>
                        <p><?php echo $nbrVente; ?></p>

                        <div class="chart-container">
                        <h2>Statistique du nombre d'homme et de femme inscrit :</h2>
                        <canvas id="donutChart"></canvas>
                        <!-- <canvas id="lineChart"></canvas> -->
                        </div>

                </table>
              </div>  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Donut Chart
      var donutData = {
        labels: ['Homme', 'Femme'],
        datasets: [{
          data: [<?php echo $nbrHomme; ?>, <?php echo $nbrFemme; ?>],
          backgroundColor: ['#FF6384', '#36A2EB']
        }]
      };

      var donutOptions = {
        responsive: true,
        maintainAspectRatio: false
      };

      var donutChart = new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      });

      // Line Chart
      var lineData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
          label: 'Ventes',
          data: [50, 60, 70, 65, 75, 80],
          borderColor: '#3e95cd',
          fill: false
        }]
      };

      var lineOptions = {
        responsive: true,
        maintainAspectRatio: false
      };

      var lineChart = new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: lineData,
        options: lineOptions
      });
    });
  </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
    
</body>
</html>
