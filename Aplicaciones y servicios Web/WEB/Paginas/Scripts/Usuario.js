jQuery(function () {
    //Registrar los botones para responder al evento click
    $("#dvMenu").load("../Paginas/Menu.html");

    //Levantar el evento click del boton insertar
    $("#btnInsertar").on("click", () => {
        EjecutarComando("POST");
    });

    $("#btnActualizar").on("click", () => {
        EjecutarComando("PUT");
    });

    $("#btnEliminar").on("click", () => {
        EjecutarComando("DELETE");
    });

    $("#btnConsultar").on("click", () => {
        Consultar();
    });

});

async function Buscar() {
    try {
        //Capturar los datos de entrada
        let Documento = $("#txtDocumento").val();
        //Invoca el fetch
        const Respuesta = await fetch("https://localhost:44374/api/Empleado/ConsultarConCargo?Documento=" + Documento,
            {
                method: "GET",
                mode: "cors",
                headers: { "Content-Type": "application/json" },
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        //La respuesta se escribe en los campos
        $("#txtNombre").val(Resultado[0].NombreEmpleado);
        $("#txtCargo").val(Resultado[0].Cargo);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}