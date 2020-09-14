<?php
@session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>J&M Médica</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo $url . 'app/assets/' ?>images/j-m-logo-b.png">




    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo $url . 'app/plugins/' ?>morris/morris.css">

    <!-- Basic Css files -->
    <link href="<?php echo $url . 'app/assets/' ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url . 'app/assets/' ?>css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url . 'app/assets/' ?>css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url . 'app/assets/' ?>icons/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo $url . 'app/assets/' ?>css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url . 'app/plugins/toastr/build/toastr.min.css' ?>" rel="stylesheet" />
    <link href="<?php echo $url . 'app/plugins/select2/css/select2.min.css' ?>" rel="stylesheet" />

    <!-- DataTables -->
    <link href="<?php echo $url ?>app/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $url ?>app/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo $url ?>app/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo $url ?>app/plugins/date-range-picker/css/daterangepicker.css" rel="stylesheet" type="text/css" />




    <!-- jQuery  -->
    <script src="<?php echo $url . 'app/assets/' ?>js/jquery.min.js"></script>
    <script src="<?php echo $url . 'app/assets/' ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url . 'app/assets/' ?>js/modernizr.min.js"></script>
    <script src="<?php echo $url . 'app/assets/' ?>js/metisMenu.min.js"></script>
    <script src="<?php echo $url . 'app/assets/' ?>js/jquery.slimscroll.js"></script>
    <script src="<?php echo $url . 'app/assets/' ?>js/waves.js"></script>

    <script src="<?php echo $url . 'app/plugins/' ?>peity-chart/jquery.peity.min.js"></script>



    <script src="<?php echo $url . 'app/plugins/toastr/build/toastr.min.js' ?>"></script>
    <script src="<?php echo $url . 'app/plugins/select2/js/select2.min.js' ?>"></script>


    <script src="<?php echo $url . 'app/plugins/jquery-number/jquery.number.js' ?>"></script>

    <!-- Sweet-Alert  -->
    <script src="<?php echo $url . 'app/plugins/sweet-alert2/sweetalert2.min.js' ?>"></script>



    <script src="<?php echo $url ?>app/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url ?>app/plugins/datatables/dataTables.bootstrap4.min.js"></script>


    <script src="<?php echo $url ?>app/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo $url ?>app/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <script src="<?php echo $url ?>app/plugins/date-range-picker/js/moment.js"></script>

    <script src="<?php echo $url ?>app/plugins/date-range-picker/js/daterangepicker.js"></script>



</head>



<body class="fixed-left">
    <div class="url-app" urlApp="<?php echo $url ?>"></div>


    <script>

    </script>

    <?php if (isset($_SESSION['session']) && $_SESSION['session']) : ?>

        <!-- Loader -->
        <!-- <div id="preloader"><div id="status"><div class="spinner"></div></div></div> -->

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php $app->obtenerComponente('topbar') ?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php $app->obtenerComponente('sidebar') ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <?php

                        $arrayRutas = array();

                        if (isset($_GET['ruta'])) {
                            $arrayRutas = explode("/", $_GET['ruta']);
                            if (
                                $arrayRutas[0] == 'salir' ||
                                $arrayRutas[0] == 'ventas' ||
                                $arrayRutas[0] == 'listar-ventas' ||
                                $arrayRutas[0] == 'kardex' ||
                                $arrayRutas[0] == 'abonos'




                            ) {
                                $app->obtenerPagina($arrayRutas[0], $arrayRutas);
                            } else {
                                $app->obtenerPagina('404', $arrayRutas);
                            }
                        } else {
                            $app->obtenerPagina('home');
                        }

                        ?>
                    </div>
                </div>

                <!-- end content -->

                <!-- Start footer -->
                <?php $app->obtenerComponente('footer') ?>
                <!-- End Footer -->
            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
    <?php else :
        $app->obtenerPagina('login')
    ?>

    <?php endif; ?>


    <script src="<?php echo $url . 'app/modulos/app/app.js' ?>"></script>


    <!--Morris Chart-->
    <script src="<?php echo $url . 'app/plugins/' ?>morris/morris.min.js"></script>
    <script src="<?php echo $url . 'app/plugins/' ?>raphael/raphael-min.js"></script>

    <script src="<?php echo $url . 'app/assets/' ?>pages/dashboard.js"></script>

    <!-- App js -->
    <script src="<?php echo $url . 'app/assets/' ?>js/app.js"></script>

    <script src="<?php echo $url . 'app/modulos/ventas/ventas.js' ?>"></script>



</body>


</html>