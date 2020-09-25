<div class="left side-menu ">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="<?php  echo $url.'home' ?>" class="waves-effect">
                        <i class="fa fa-tachometer"></i> <span> Inicio </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-file-text"></i><span> Ventas <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu collapse">
                        <li><a href="<?php echo $url .'ventas' ?>">Nueva venta</a></li>
                        <li><a href="<?php echo $url .'listar-ventas' ?>">Listar ventas</a></li>
                        <li><a href="<?php echo $url .'kardex' ?>">Kardex</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shopping-bag"></i><span> Compras <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu collapse">
                        <li><a href="<?php echo $url .'compras' ?>">Nueva compra</a></li>
                        <li><a href="<?php echo $url .'listar-compras' ?>">Listar compras</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-minus"></i><span> Gastos <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu collapse">
                        <li><a href="<?php echo $url .'gastos' ?>">Nuevo Gasto</a></li>
                        <li><a href="<?php echo $url .'listar-gastos' ?>">Listar gastos</a></li>
                        <li><a href="<?php echo $url .'categorias' ?>">Gestión de categorías</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i><span> Clientes <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu collapse">
                        <li><a href="<?php echo $url .'' ?>">Nuevo cliente</a></li>
                        <li><a href="<?php echo $url .'' ?>">Listar clientes</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-truck"></i><span> Proveedores <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu collapse">
                        <li><a href="<?php echo $url .'' ?>">Nuevo proveedor</a></li>
                        <li><a href="<?php echo $url .'' ?>">Listar proveedores</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-bar-chart" aria-hidden="true"></i><span> Reportes <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu collapse">
                        <li><a href="<?php echo $url .'' ?>">Informe  de cuentas por cobrar</a></li>
                        <li><a href="<?php echo $url .'' ?>">Informe  de cuentas por pagar</a></li>
                        <li><a href="<?php echo $url .'' ?>">Informe  de ventas</a></li>
                        <li><a href="<?php echo $url .'' ?>">Informe  de compras</a></li>
                        <li><a href="<?php echo $url .'' ?>">Informe  de gastos</a></li>
                        <li><a href="<?php echo $url .'' ?>">Informe  de ventas pagadas</a></li>
                        <li><a href="<?php echo $url .'' ?>">Informe  de ventas debidas</a></li>
                    </ul>
                </li>


            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>