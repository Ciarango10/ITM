jQuery(function () {
    //Levantar el evento click del boton insertar
    $("#btnInsertar").on("click", () => {
        insertar();
    });
});

async function insertar() {
    let Documento = $("#txtDocumento").val();
    let Nombre = $("#txtNombre").val();
    let FechaCredito = $("#txtFechaCredito").val();
    let Afiliado = $("#txtAfiliado").val().toUpperCase();
    let ValorCredito = $("#txtValorCredito").val();
    let PlazoCredito = $("#txtPlazo").val();

    let DatosPrestamo = {
        Documento: Documento,
        Nombre: Nombre,
        FechaCredito: FechaCredito,
        Afiliado: Afiliado,
        ValorCredito: ValorCredito,
        PlazoCredito: PlazoCredito,
    }

    try {
        const Respuesta = await fetch("http://localhost:50274/api/Clientes",
            {
                method: "POST",
                mode: "cors",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(DatosPrestamo)
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        $("#dvMensaje").html(Resultado);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}

