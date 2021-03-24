@extends('layouts.app')

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WAWI</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
@section('content')
<div class="container">
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <a href="pdf/Report.docx" download target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i style="color: white;" class="fa fa-download fa-sm"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      Anzahl Benutzer:</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Http\Controllers\UserManagementController::getAllUser()}}
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-users fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      Anzahl Produkte</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Http\Controllers\ProductController::getAllProducts()}}</div>
                  </div>
                  <div class="col-auto">
                    <i class="fa fa-archive fa-2x"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Anzahl Kuriere</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Http\Controllers\CourierController::getAllCouriers()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-truck fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                      Anzahl Produzenten</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{\App\Http\Controllers\ProducerController::getAllProducers()}}</div>
                  </div>
                    <div class="col-auto">
                        <i class="fa fa-industry fa-2x"></i>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Pending Requests Card Example -->


        <!-- Content Row -->

        <div class="row">

          <!-- Area Chart -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Anzahl Kategorien:</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Http\Controllers\CategoryController::getAllCategories()}}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-list fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Content Row -->
        <div class="row">
          <div class="col-lg-12 mb-4 text-center">
            <!-- Illustrations -->
            <!-- Approach -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
              </div>
              <div class="card-body">
                <p>Mit Hilfe von diesem Tool, kann man die Podukte, Lieferanten, User admininstrieren. Vielen Dank an
                den Hauptentwickler BENJAMIN FRANKLIN</p>
                <p class="mb-0">Neben der genannten Vorschrift in der Datenschutz-Grundverordnung gibt es weitergehende Pflichten zum Vorhalten einer Datenschutzerklärung .</p>
              </div>
            </div>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

  </div>
</div>

<!-- Bootstrap core JavaScript-->
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
@endsection
