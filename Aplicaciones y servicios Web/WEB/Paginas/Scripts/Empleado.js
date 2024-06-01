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

async function Consultar() {
    let Token = getCookie("token");
    //Capturar los datos de entrada
    let Documento = $("#txtDocumento").val();

    //Invoca Fetch
    try {
        const Respuesta = await fetch("https://localhost:44374/api/Empleados?Documento=" + Documento,
            {
                method: "GET",
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": 'Bearer ' + Token
                }
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        //La respuesta se escribe en los campos
        $("#txtNombre").val(Resultado.Nombre);
        $("#txtPrimerApellido").val(Resultado.PrimerApellido);
        $("#txtSegundoApellido").val(Resultado.SegundoApellido);
        $("#txtDireccion").val(Resultado.Direccion);
        $("#txtFechaNacimiento").val(Resultado.FechaNacimiento);
        $("#txtTelefono").val(Resultado.Telefono);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}

async function EjecutarComando(Comando) {
    //Capturar los datos de entrada
    let Documento = $("#txtDocumento").val();
    let Nombre = $("#txtNombre").val();
    let PrimerApellido = $("#txtPrimerApellido").val();
    let SegundoApellido = $("#txtSegundoApellido").val();
    let Direccion = $("#txtDireccion").val();
    let FechaNacimiento = $("#txtFechaNacimiento").val();
    let Telefono = $("#txtTelefono").val();

    //Construir la estructura JSON para enviar la informacion al servidor
    let DatosEmpleado = {
        Documento: Documento,
        Nombre: Nombre,
        PrimerApellido: PrimerApellido,
        SegundoApellido: SegundoApellido,
        Direccion: Direccion,
        FechaNacimiento: FechaNacimiento,
        Telefono: Telefono
    }

    //Invocar la función fetch para grabar en la base de datos, a través del servicio
    //La función fetch de javascript, permite invocar un servicio en la nube
    //fetch("Ruta del servicio", Opciones para la ejecución: Comando que se ejecuta: POST, PUT, GET, DELETE, modo de conexión,
    //el tipo de dato que se envía, los datos)
    //En el body, se envían los datos al servicio, en formato json
    //Javascript, tiene una librería JSON, que permite convertir la variable en formato json
    try {
        let Token = getCookie("token");
        const Respuesta = await fetch("https://localhost:44374/api/Empleados",
            {
                method: Comando,
                mode: "cors",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": 'Bearer ' + Token
                },
                body: JSON.stringify(DatosEmpleado)
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        $("#dvMensaje").html(Resultado);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}