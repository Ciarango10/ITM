jQuery(function () {
    //Registrar los botones para responder al evento click
    $("#dvMenu").load("../Paginas/Menu.html");

    //Levantar el evento click del boton insertar
    $("#btnInsertar").on("click", () => {
        insertar();
    });
});

//Funcion para grabar
async function insertar() {
    let Documento = $("#txtDocumento").val();
    let Nombre = $("#txtNombre").val();
    let PrimerApellido = $("#txtPrimerApellido").val();
    let SegundoApellido = $("#txtSegundoApellido").val();
    let Direccion = $("#txtDireccion").val();
    let FechaNacimiento = $("#dtFechaNacimiento").val();
    let Email = $("#txtEmail").val();

    //Construir la estructura JSON para enviar la informacion al servidor
    let DatosClientes = {
        Documento: Documento,
        Nombre: Nombre,
        PrimerApellido: PrimerApellido,
        SegundoApellido: SegundoApellido,
        Direccion: Direccion,
        FechaNacimiento: FechaNacimiento,
        Email: Email
    }

    //Invocar la función fetch para grabar en la base de datos, a través del servicio
    //La función fetch de javascript, permite invocar un servicio en la nube
    //fetch("Ruta del servicio", Opciones para la ejecución: Comando que se ejecuta: POST, PUT, GET, DELETE, modo de conexión,
    //el tipo de dato que se envía, los datos)
    //En el body, se envían los datos al servicio, en formato json
    //Javascript, tiene una librería JSON, que permite convertir la variable en formato json
    try {
        const Respuesta = await fetch("https://localhost:44374/api/Clientes",
            {
                method: "POST",
                mode: "cors",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(DatosClientes)
            });
        //Leer la respuesta y presentarla en el div
        const Resultado = await Respuesta.json();
        $("#dvMensaje").html(Resultado);
    }
    catch (error) {
        $("#dvMensaje").html(error);
    }
}

