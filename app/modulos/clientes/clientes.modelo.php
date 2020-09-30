
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 28/09/2020 21:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class ClientesModelo
{
    public static function mdlAgregarClientes($cts)
    {
        try {

            $sql = "INSERT INTO tbl_clientes_cts (cts_nombre,cts_direccion,cts_telefono,cts_correo) VALUES(?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $cts['cts_nombre']);
            $pps->bindValue(2, $cts['cts_direccion']);
            $pps->bindValue(3, $cts['cts_telefono']);
            $pps->bindValue(4, $cts['cts_correo']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            // throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarClientes()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarClientes($cts_id = "")
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
        } catch (PDOException $th) {
            throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarClientes()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
