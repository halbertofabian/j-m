





listarProveedores();

$("#formAddProveedor").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearProveedor", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/compras/compras.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#pvs_nombre").val("")
                $('#mdlProveedor').modal('hide')

                $('#cps_proveedor option').remove();
                listarProveedores();
                $("#cps_proveedor option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})




function listarProveedores() {
    var datos = new FormData()

    datos.append("btnListarProveedores", true)

    $.ajax({
        type: "POST",
        url: './app/modulos/compras/compras.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            res.forEach(element => {

                $('#cps_proveedor').prepend(`<option value='${element.pvs_id}' >${element.pvs_nombre}</option>`);

            });




        }
    });
}


$(".tablaCompras tbody").on("click", "button.btnLiquidarCompra", function () {
    var cps_folio = $(this).attr("cps_folio")
    swal({
        title: "¿Seguro de querer liquidar esta compra?",
        text: "La compra con folio " + cps_folio + " será liquidada. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, liquidar la compra con folio " + cps_folio],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData()
                datos.append("btnLiquidarCompra", true)
                datos.append("cps_folio", cps_folio)

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/compras/compras.ajax.php',
                    data: datos,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function () {

                    },
                    success: function (res) {

                        if (res.status) {
                            swal({
                                title: "Muy bien",
                                text: res.mensaje,
                                icon: "success",
                                buttons: [false, "Continuar"],
                                dangerMode: true,
                                closeOnClickOutside: false,

                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        location.href = res.pagina
                                    } else {
                                        location.href = res.pagina
                                    }
                                });
                        } else {
                            swal({
                                title: "Error",
                                text: res.mensaje,
                                icon: "error",
                                buttons: [false, "Continuar"],
                                dangerMode: true,
                                closeOnClickOutside: false,

                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        location.href = res.pagina
                                    } else {
                                        location.href = res.pagina
                                    }
                                });

                        }

                    }
                })

            }
        })



})