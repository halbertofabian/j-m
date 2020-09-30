$(document).on("ready", function () {
})



listarVendedores();


$("#formAddVendedor").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearVendedor", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#usr_nombre").val("")
                $('#mdlVendedor').modal('hide')

                $('#vts_vendedor option').remove();
                listarVendedores();
                $("#vts_vendedor option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})



function listarVendedores() {
    var datos = new FormData()

    datos.append("btnListarVendedores", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            res.forEach(element => {

                $('#vts_vendedor').prepend(`<option value='${element.usr_id}' >${element.usr_nombre}</option>`);

            });




        }
    });
}





$("#formGuardarAbono").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnGuardarAbono", true)



    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                swal({
                    title: "Correcto",
                    text: res.mensaje,
                    icon: "success",
                    buttons: [false, "Continuar"],
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = res.pagina
                        } else {
                            window.location.href = res.pagina
                        }
                    });
            } else {
                toastr.error(res.mensaje, 'Error')
            }


        }
    });
})

$(".tablaVentas tbody").on("click", "button.btnListarAbonos", function () {
    vts_factura = $(this).attr("vts_factura")
    $("#abs_venta").val(vts_factura)
    var datos = new FormData()
    datos.append("vts_factura", vts_factura)
    datos.append("btnListarAbonos", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "html",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            $("#historial-abonos").html(res)

        }
    });
})

$(".tablaVentas tbody").on("click", "button.btnEliminarVenta", function () {
    var vts_factura = $(this).attr("vts_factura");
    swal({
        title: "¿Seguro de querer eliminar esta venta?",
        text: "La venta con número " + vts_factura + " será eliminada y todo lo relacionado, es decir también los abonos realizados a esta venta. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar la venta con número " + vts_factura],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("btnEliminarVenta", true);
                datos.append("vts_factura", vts_factura);

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
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
                });
            }
        });

})




$('#daterange-btn').daterangepicker(
    {
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment(),
        endDate: moment()
    },
    function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        var fechaInicial = start.format('YYYY-MM-DD');

        var fechaFinal = end.format('YYYY-MM-DD');

        var capturarRango = $("#daterange-btn span").html();

        localStorage.setItem("capturarRango", capturarRango);

        window.location = "index.php?ruta=ventas&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

    }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function () {

    localStorage.removeItem("capturarRango");
    localStorage.clear();
    window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function () {

    var textoHoy = $(this).attr("data-range-key");

    if (textoHoy == "Hoy") {

        var d = new Date();

        var dia = d.getDate();
        var mes = d.getMonth() + 1;
        var año = d.getFullYear();

        dia = ("0" + dia).slice(-2);
        mes = ("0" + mes).slice(-2);

        var fechaInicial = año + "-" + mes + "-" + dia;
        var fechaFinal = año + "-" + mes + "-" + dia;

        localStorage.setItem("capturarRango", "Hoy");

        window.location = "index.php?ruta=ventas&fechaInicial=" + fechaInicial + "&fechaFinal=" + fechaFinal;

    }

})

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();



if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;
var today = year + "-" + month + "-" + day;


$(".theDate").val(today)


var dateTo = new Date();

var dayTo = dateTo.getDate();
var monthTo = dateTo.getMonth() + 2;
var yearTo = dateTo.getFullYear();



if (monthTo < 10) monthTo = "0" + monthTo;
if (dayTo < 10) dayTo = "0" + dayTo;
var todayTo = yearTo + "-" + monthTo + "-" + dayTo;


$(".theDateTo").val(todayTo)



function btnEnviarCorreo(cts_correo) {
    alert(cts_correo)
}

function btnEnviarWp(cts_numero) {
    alert("hola")
}

$("#formCuentasCobrar").on("submit", function (e) {
    e.preventDefault()

    listarCuentasCobrar([
        $("#vts_vendedor").val(),
        $("#vts_cliente").val(),
        $("#vts_factura").val(),
        '',
        '',
        ''
    ])



})


listarCuentasCobrar(['', '', '', '', '', ''])

function listarCuentasCobrar(valores) {

    var datos = new FormData()
    datos.append("vts_vendedor", valores[0])
    datos.append("vts_cliente", valores[1])
    datos.append("vts_factura", valores[2])
    datos.append("vts_fecha_cobro", valores[3])
    datos.append("vts_fecha_cobro_inicio", valores[4])
    datos.append("vts_fecha_cobro_fin", valores[5])
    datos.append("listarCuentasCobrar", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(".div-load").html(
                `<div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                `)

        },
        success: function (res) {
            $(".div-load").html(``)
            var html = `
            <div class="col-12">
                <div class="table-responsive" id="tblCuentasCobrar">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#Número de fectura</th>
                                <th>Estado</th>
                                <th>Vendedor</th>
                                <th>Clientes</th>
                                <th>Teléfono</th>
                                <th>Fecha de venta</th>
                                <th>Fechas de cobro</th>
                                <th>Cantidad</th>
                                <th>Adeudo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyCuentasCobrar">`;
            if (res.length > 0) {
                res.forEach(vts => {
                    html +=
                        `<tr>
                <td>${vts['vts_factura']}</td>
                <td>
                <button type="button" onclick="btnLiquidarVenta('${vts['vts_factura']}')" class="btn btn-success">Liquidar</button>
                </td>
                <td>${vts['usr_nombre']}</td>
                <td>${vts['cts_nombre']}</td>
                <td>${vts['cts_telefono']}</td>
                <td>${vts['vts_fecha_venta']}</td>
                <td>${vts['vts_fecha_cobro']}</td>
                <td>${vts['vts_cantidad']}</td>
                <td></td>
                <td>
                    <div class="btn-group">
                        <button type="button" onclick="btnEnviarCorreo('${vts['cts_correo']}')" class="btn btn-dark"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                        <button type="button" onclick="btnEnviarWp('${vts['cts_telefono']}')" class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i></button>
                    </div>
                </td>
            </tr>`;

                });
            } else {
                html +=
                    `<td class="text-center" colspan="10">
                        No se encontraron resultados
                    </td>`
            }
            html += `
            </tbody>
                    </table>
                </div>
            </div>`;
            $("#divCuentasCobrar").html(html)
        }
    })

}