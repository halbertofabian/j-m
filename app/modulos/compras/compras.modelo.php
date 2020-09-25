<?php
require_once DOCUMENT_ROOT . 'app/modulos/conexion/conexion.php';

class ComprasModelo
{

    public static function  mdlCrearCompra($ventas)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_compras_cps (cps_folio,cps_proveedor,cps_fecha_compra,cps_fecha_pago,cps_cantidad,cps_tp,cps_mp,cps_estado_pagado,cps_fecha_pagado,cps_usuario_registro,cps_nota) VALUES (?,?,?,?,?,?,?,?,?,?,?) ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ventas['cps_folio']);
            $pps->bindValue(2, $ventas['cps_proveedor']);
            $pps->bindValue(3, $ventas['cps_fecha_compra']);
            $pps->bindValue(4, $ventas['cps_fecha_pago']);
            $pps->bindValue(5, $ventas['cps_cantidad']);
            $pps->bindValue(6, $ventas['cps_tp']);
            $pps->bindValue(7, $ventas['cps_mp']);
            $pps->bindValue(8, $ventas['cps_estado_pagado']);
            $pps->bindValue(9, $ventas['cps_fecha_pagado']);
            $pps->bindValue(10, $ventas['cps_usuario_registro']);
            $pps->bindValue(11, $ventas['cps_nota']);



            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (PDOException $th) {

            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCrearAbonoCompra($abonos)
    {

        try {
            //code...
            $sql = "INSERT INTO tbl_abonos_abs_compras (abs_compra,abs_monto,abs_fecha,abs_usuario_registro,abs_adeudo,abs_mp) VALUES (?,?,?,?,?,?) ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $abonos['abs_compra']);
            $pps->bindValue(2, $abonos['abs_monto']);
            $pps->bindValue(3, $abonos['abs_fecha']);
            $pps->bindValue(4, $abonos['abs_usuario_registro']);
            $pps->bindValue(5, $abonos['abs_adeudo']);
            $pps->bindValue(6, $abonos['abs_mp']);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {

            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarCompra($cps_folio = "")
    {
        try {
            if ($cps_folio == "") {
                $sql = "SELECT cps.*,pvs.pvs_nombre FROM tbl_compras_cps cps JOIN  tbl_proveedores_pvs pvs ON  cps.cps_proveedor = pvs.pvs_id  ORDER BY cps.cps_folio ASC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($cps_folio != "") {
                $sql = "SELECT cps.*,pvs.pvs_nombre,abs.* FROM tbl_compras_cps cps JOIN  tbl_proveedores_pvs pvs ON  cps.cps_proveedor = pvs.pvs_id  JOIN tbl_abonos_abs_compras abs ON abs.abs_compra = cps.cps_folio WHERE cps.cps_folio  = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $cps_folio);
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


    public static function mdlCrearProveedor($proveedor)
    {

        try {
            $sql = "INSERT INTO tbl_proveedores_pvs (pvs_nombre,pvs_telefono) VALUES(?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $proveedor['pvs_nombre']);
            $pps->bindValue(2, $proveedor['pvs_telefono']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (\PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarProveedores($pvs_id = "")
    {
        try {
            if ($pvs_id == "") {
                $sql = "SELECT * FROM tbl_proveedores_pvs ORDER BY pvs_id DESC ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } elseif ($pvs_id != "") {
                $sql = "SELECT * FROM tbl_proveedores_pvs WHERE pvs_id  = ? ";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $pvs_id);
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
}
