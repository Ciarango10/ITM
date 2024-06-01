jQuery(function () {
    $("#dvMenu").load("../Paginas/Menu.html");
    LLenarComboEmpleados();
    LLenarComboTipoProducto();
    $("#txtNumeroFactura").val("0");
});

function LLenarComboEmpleados() {
    LlenarComboServiciosAuth("https://localhost:44374/api/Empleados/LlenarCombo", "#cboEmpleado");
}

function LlenarTablaFactura() {
    let NumeroFactura = $("#txtNumeroFactura").val();
    LlenarTablaServiciosAuth("https://localhost:44374/api/Facturacion/LlenarTablaFacturacion?NumeroFactura=" + NumeroFactura, "#tblFactura");
}

async function LLenarComboTipoProducto() {
    let rpta = await LlenarComboServiciosAuth("https://localhost:44374/api/TipoProductos/LlenarCombo", "#cboTipoProducto");
    LlenarComboProducto();
}

async function LlenarComboProducto() {
    let idTipoProducto = $("#cboTipoProducto").val();
    let rpta = LlenarComboServiciosAuth("https://localhost:44374/api/Productos/LlenarCombo?idTipoProducto=" + idTipoProducto, "#cboProducto");
    PresentarValorUnitario();
}

function PresentarValorUnitario() {
    let DatosProducto = $("#cboProducto").val();
    let CodigoProducto = DatosProducto.split('|')[0];
    let ValorUnitario = DatosProducto.split('|')[1];

    $("#txtValorUnitarioTexto").val(FormatoMiles(ValorUnitario));
    $("#txtValorUnitario").val(ValorUnitario);
    $("#txtCodigoProducto").val(CodigoProducto);
    CalcularSubtotal();
}

function GrabarFactura() {
    $("#txtNumeroFactura").val("0");
    $("#txtDocumento").val("");
    $("#txtNombreCliente").val("");
    var table = new DataTable('#tblFactura');
    table.clear().draw();
}

function CalcularSubtotal() {
    let ValorUnitario = $("#txtValorUnitario").val();
    let Cantidad = $("#txtCantidad").val();
    $("#txtSubtotal").val(FormatoMiles(Cantidad * ValorUnitario));
}

async function Consultar() {
    //Solo se captura la información del documento del empleado y se invoca el servicio
    let Documento = $("#txtDocumento").val();
    //Fetch para grabar en la base de datos
    try {
        let Token = getCookie("token");
        const Respuesta = await fetch("https://localhost:44374/api/Clientes?Documento=" + Documento,
            {
                method: "GET",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": 'Bearer ' + Token
                }
            });
        //Se lee la respuesta y se convierte a json
        const Resultado = await Respuesta.json();
        //Las respuestas se escriben en el html
        $("#txtNombreCliente").val(Resultado.Nombre + " " + Resultado.PrimerApellido);
    }
    catch (error) {
        //Se presenta el error en el "dvMensaje" de la interfaz
        $("#dvMensaje").html(error);
    }
}

async function GrabarProducto() {
    let NumeroFactura = $("#txtNumeroFactura").val();
    let Documento = $("#txtDocumento").val();
    let idEmpleado = $("#cboEmpleado").val();
    let CodigoProducto = $("#txtCodigoProducto").val();
    let Cantidad = $("#txtCantidad").val();
    let ValorUnitario = $("#txtValorUnitario").val();

    let DatosFactura = {
        Numero: NumeroFactura,
        Documento: Documento,
        Fecha: "2024/01/01",
        CodigoEmpleado: idEmpleado
    }
    let Token = getCookie("token");
    if (NumeroFactura == 0) {
        //Se graba el encabezado
        try {
            const Respuesta = await fetch("https://localhost:44374/api/Facturacion/GrabarEncabezado",
                {
                    method: "POST",
                    mode: "cors",
                    headers: {
                        "Content-Type": "application/json",
                        'Authorization': 'Bearer ' + Token
                    },
                    body: JSON.stringify(DatosFactura)
                });
            //Leer la respuesta del servicio
            const Resultado = await Respuesta.json();
            NumeroFactura = Resultado;
            $("#txtNumeroFactura").val(NumeroFactura);
        }
        catch (_error) {
            //Presentar a respuesta del error en el html
            $("#dvMensaje").html(_error);
        }
    }
    //Se graba el detalle
    let DatosDetalleFactura = {
        Numero: NumeroFactura,
        CodigoProducto: CodigoProducto,
        Cantidad: Cantidad,
        ValorUnitario: ValorUnitario
    }
    try {
        const Respuesta = await fetch("https://localhost:44374/api/Facturacion/GrabarDetalle",
            {
                method: "POST",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + Token
                },
                body: JSON.stringify(DatosDetalleFactura)
            });
        //Leer la respuesta del servicio
        const Resultado = await Respuesta.json();
        LlenarTablaFactura();
    }
    catch (_error) {
        //Presentar a respuesta del error en el html
        $("#dvMensaje").html(_error);
    }
}

async function Eliminar(idDetalle) {
    let Token = getCookie("token");
    try {
        const Respuesta = await fetch("https://localhost:44374/api/Facturacion/EliminarDetalle?idDetalleFactura=" + idDetalle,
            {
                method: "DELETE",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + Token
                }
            });
        //Leer la respuesta del servicio
        const Resultado = await Respuesta.json();
        LlenarTablaFactura();
    }
    catch (_error) {
        //Presentar a respuesta del error en el html
        $("#dvMensaje").html(_error);
    }
}