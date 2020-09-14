<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="<?php  echo $url ?>" class="waves-effect">
                        <i class="dripicons-meter"></i> <span> Inicio </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-message"></i><span> Ventas <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu collapse">
                        <li><a href="<?php echo $url .'ventas' ?>">Nueva venta</a></li>
                        <li><a href="<?php echo $url .'listar-ventas' ?>">Listar ventas</a></li>
                        <li><a href="<?php echo $url .'kardex' ?>">Kardex</a></li>

                    </ul>
                </li>


            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>