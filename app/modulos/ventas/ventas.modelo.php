<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/j&m/app/modulos/conexion/conexion.php';

class VentasModelo
{

    public static function  mdlCrearVenta($ventas)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_ventas_vts (vts_factura,vts_vendedor,vts_cliente,vts_cantidad,vts_fecha_venta,vts_tp,vts_fecha_pagado,vts_estado_pagado,vts_usuario_registro) VALUES (?,?,?,?,?,?,?,?,?) ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ventas['vts_factura']);
            $pps->bindValue(2, $ventas['vts_vendedor']);
            $pps->bindValue(3, $ventas['vts_cliente']);
            $pps->bindValue(4, $ventas['vts_cantidad']);
            $pps->bindValue(5, $ventas['vts_fecha_venta']);
            $pps->bindValue(6, $ventas['vts_tp']);
            $pps->bindValue(7, $ventas['vts_fecha_pagado']);
            $pps->bindValue(8, $ventas['vts_estado_pagado']);
            $pps->bindValue(9, $ventas['vts_usuario_registro']);
            // $pps->bindValue(9, $ventas['vts_detalle_abono']);


            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {

            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCrearAbono($abonos)
    {

        try {
            //code...
            $sql = "INSERT INTO tbl_abonos_abs (abs_venta,abs_monto,abs_fecha,abs_usuario_registro,abs_adeudo) VALUES (?,?,?,?,?) ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abonos['abs_venta']);
            $pps->bindValue(2, $abonos['abs_monto']);
            $pps->bindValue(3, $abonos['abs_fecha']);
            $pps->bindValue(4, $abonos['abs_usuario_registro']);
            $pps->bindValue(5, $abonos['abs_adeudo']);


            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {

            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarVenta($vts_factura = "")
    {
        try {
            if ($vts_factura == "") {
                $sql = "SELECT vts.*,usr.usr_nombre,cts.cts_nombre FROM tbl_ventas_vts vts JOIN  tbl_usuarios_usr usr ON  vts.vts_vendedor = usr.usr_id JOIN tbl_clientes_cts cts ON  vts.vts_cliente = cts.cts_id ORDER BY vts.vts_factura ASC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($vts_factura != "") {
                $sql = "SELECT vts.*,usr.usr_nombre,cts.cts_nombre,abs.* FROM tbl_ventas_vts vts JOIN  tbl_usuarios_usr usr ON  vts.vts_vendedor = usr.usr_id JOIN tbl_clientes_cts cts ON  vts.vts_cliente = cts.cts_id JOIN tbl_abonos_abs abs ON abs.abs_venta = vts.vts_factura                WHERE vts.vts_factura  = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $vts_factura);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCrearVendedor($vendedor)
    {

        try {
            $sql = "INSERT INTO tbl_usuarios_usr (usr_nombre,usr_rol) VALUES(?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vendedor['usr_nombre']);
            $pps->bindValue(2, $vendedor['usr_rol']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCrearCliente($cliente)
    {

        try {
            $sql = "INSERT INTO tbl_clientes_cts (cts_nombre) VALUES(?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cliente['cts_nombre']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarVendedores($usr_id = "")
    {
        try {
            if ($usr_id == "") {
                $sql = "SELECT * FROM tbl_usuarios_usr ORDER BY usr_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($usr_id != "") {
                $sql = "SELECT * FROM tbl_usuarios_usr WHERE usr_id  = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $usr_id);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarClientes($cts_id = "")
    {
        try {
            if ($cts_id == "") {
                $sql = "SELECT * FROM tbl_clientes_cts ORDER BY cts_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($cts_id != "") {
                $sql = "SELECT * FROM tbl_clientes_cts WHERE cts_id  = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $cts_id);
                $pps->execute();
                return $pps->fetch();
            }
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    //SELECT vts.*,abs.* FROM tbl_ventas_vts vts JOIN tbl_abonos_abs abs ON vts.vts_factura = abs.abs_venta; 


    public static function mdlConsultarSumaVentaVendedor($usr_id)
    {
        try {

            $sql = "SELECT SUM(vts.vts_cantidad) AS vts_cantidad_total_vendedor FROM tbl_ventas_vts vts WHERE vts.vts_vendedor  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarSumaCreditoVendedor($usr_id)
    {
        try {

            $sql = "SELECT SUM(vts.vts_cantidad) AS vts_cantidad_credito_vendedor FROM tbl_ventas_vts vts WHERE vts.vts_vendedor  = ? AND vts.vts_tp = 'Credito' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarSumaContadoVendedor($usr_id)
    {
        try {

            $sql = "SELECT SUM(vts.vts_cantidad) AS vts_cantidad_contado_vendedor FROM tbl_ventas_vts vts WHERE vts.vts_vendedor = ? AND vts.vts_tp = 'Contado' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarSumaPagadoVendedor($usr_id)
    {
        try {

            $sql = "SELECT SUM(abs.abs_monto) AS abs_monto_pagado FROM tbl_abonos_abs abs  JOIN tbl_ventas_vts vts ON vts.vts_factura = abs_venta WHERE vts.vts_vendedor = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarAbonosVentas($vts_factura)
    {
        try {

            $sql = "SELECT vts.*,abs.*,usr.usr_nombre,cts.cts_nombre FROM tbl_ventas_vts vts JOIN tbl_abonos_abs abs ON vts.vts_factura = abs.abs_venta JOIN tbl_usuarios_usr usr ON vts.vts_vendedor = usr.usr_id JOIN tbl_clientes_cts cts ON vts.vts_cliente = cts.cts_id WHERE vts.vts_factura  = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vts_factura);
            $pps->execute();
            return $pps->fetchAll();
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarVentaAbono($datosA)
    {

        try {
            $sql = "UPDATE tbl_ventas_vts SET vts_fecha_pagado = ? , vts_estado_pagado = ? WHERE vts_factura = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $datosA['vts_fecha_pagado']);
            $pps->bindValue(2, $datosA['vts_estado_pagado']);
            $pps->bindValue(3, $datosA['vts_factura']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
