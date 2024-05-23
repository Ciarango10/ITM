//Se define una variable de tipo datable, púlica para la página
//var oTabla = $("#tblSubasta").DataTable();
jQuery(function () {

    $("#btnInsertar").on("click", () => {
        EjecutarComando("POST", "CrearSubasta");
    });

    $("#btnActualizar").on("click", () => {
        EjecutarComando("PUT", "ActualizarSubasta");
    });

    LlenarComboTipoVehiculos();
    LlenarTablaSubastaVehiculos();

});

function LlenarComboTipoVehiculos() {
    LlenarComboXServicios("https://localhost:44395/api/TipoVehiculos", "#cboTipoVehiculo")
}

function LlenarTablaSubastaVehiculos() {
    LlenarTablaXServicios("https://localhost:44395/api/SubastaVehiculos/ConsultarConTipoVehiculo", "#tblSubasta")
}

async function EjecutarComando(Comando, Extension) {

    let Codigo = $("#txtCodigo").val();
    let Vendedor = $("#txtVendedor").val();
    let Comprador = $("#txtComprador").val();
    let ValorVenta = $("#txtValorVenta").val();
    let TipoVehiculo = $("#cboTipoVehiculo").val()
    let Vehiculo = $("#txtVehiculo").val();
    let PlacaVehiculo = $("#txtPlaca").val();
    let ValorComision = $("#txtValorComision").val();
    let CiudadEntrega = $("#txtCiudad").val();

    let DatosSubasta = {
        idSubastaVehiculos: Codigo,
        Vendedor: Vendedor,
        Comprador: Comprador,
        ValorVenta: ValorVenta,
        idTipoVehiculo: TipoVehiculo,
        Vehiculo: Vehiculo,
        PlacaVehiculo: PlacaVehiculo,
        ValorComision: ValorComision,
        CiudadEntrega: CiudadEntrega
    }

    let sURLBase = "https://localhost:44395/api/SubastaVehiculos/";

    try {
        const Respuesta = await fetch(sURLBase + Extension,
            {
                method: Comando,
                mode: "cors",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(DatosSubasta)
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        $("#dvMensaje").html(Resultado);
        LlenarTablaSubastaVehiculos();
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }

}
